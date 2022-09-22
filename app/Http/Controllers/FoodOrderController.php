<?php

namespace App\Http\Controllers;

use App\Models\FoodEntry;
use App\Models\FoodOrder;
use App\Models\Member;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Requests\FoodOrderStoreRequest;
use App\Http\Requests\FoodOrderUpdateRequest;

class FoodOrderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', FoodOrder::class);

        $search = $request->get('search', '');

        $foodOrders = FoodOrder::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.food_orders.index', compact('foodOrders', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', FoodOrder::class);

        $members = Member::join('membership_types', 'membership_types.id', '=', 'members.membership_type_id')
            ->select('members.name','members.phone','members.balance','members.limit', 'members.membership_no', 'members.id', 'membership_types.discount_rate')
            ->orderBy('members.membership_no')->get();

        $foodentries = FoodEntry::select('id', 'name', 'price', 'sub_name')->get();
        $paymentTypes = PaymentType::all();

        return view('app.food_orders.create', compact('foodentries', 'members', 'paymentTypes'));
    }

    /**
     * @param \App\Http\Requests\FoodOrderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', FoodOrder::class);

        $menu_names = collect(json_decode($request->menu_names));

        $foodOrder = new FoodOrder;
        $foodOrder->member_id = $request->member_id;
        $foodOrder->quantity = $menu_names->sum('q');
        $foodOrder->price = $menu_names->sum('p');

        $discount_rate = (float)$request->discount_rate;
        $foodOrder->discount_rate = $discount_rate;
        if($discount_rate) {
            $foodOrder->discount = $foodOrder->price*$discount_rate/100;
        }else $foodOrder->discount = 0;

        $special_discount_rate = (float)$request->special_discount_rate;
        $foodOrder->special_discount_rate = $special_discount_rate;
        if($special_discount_rate) {
            $foodOrder->special_discount = $foodOrder->price*$special_discount_rate/100;
        }else $foodOrder->special_discount = 0;


        $foodOrder->discounted_price = $foodOrder->price - ($foodOrder->discount + $foodOrder->special_discount);

        $vat_rate = (float)$request->vat_rate;
        $foodOrder->vat_rate = $vat_rate;
        if($vat_rate) {
            $foodOrder->vat = $foodOrder->discounted_price*($vat_rate)/100;
        }else $foodOrder->vat = 0;

        $foodOrder->payable_amount = $foodOrder->discounted_price + $foodOrder->vat;
        $foodOrder->mobile = $request->mobile;
        $foodOrder->menu_names = $menu_names;

        $foodOrder->payment_type_id = empty($request->payment_type_id)? null: $request->payment_type_id;

        //invoice
        $invoice = FoodOrder::orderBy('invoice_no')->whereDate('invoice_date', date('Y-m-d'))->select('invoice_no', 'invoice_incremental')->first();

        if($invoice) {
            $invoice_incremental = $invoice->invoice_incremental+1;
            $invoice_no = date('dmy').$invoice_incremental;

            $foodOrder->invoice_incremental = $invoice_incremental;
            $foodOrder->invoice_no = $invoice_no;
            $foodOrder->invoice_date = now();;
        }
        else {
            $foodOrder->invoice_incremental = 1;
            $foodOrder->invoice_no = date('dmy').'1';;
            $foodOrder->invoice_date = now();;
        }


        $foodOrder->created_by_id = auth()->id();
        $foodOrder->save();

        return redirect()
            ->route('food-orders.edit', $foodOrder)
            ->withSuccess(__('crud.common.created'));
    }

    public function confirmFoodOrder(Request $request)
    {
        return $request;
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodOrder $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FoodOrder $foodOrder)
    {
        $this->authorize('view', $foodOrder);

        return view('app.food_orders.show', compact('foodOrder'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodOrder $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FoodOrder $foodOrder)
    {
        if(!empty($foodOrder->payment_status)) {
            $this->authorize('view', $foodOrder);
            return view('app.food_orders.show', compact('foodOrder'));
        }

        $this->authorize('update', $foodOrder);

        $members = Member::join('membership_types', 'membership_types.id', '=', 'members.membership_type_id')
            ->select('members.name','members.phone','members.balance','members.limit', 'members.membership_no', 'members.id', 'membership_types.discount_rate')
            ->orderBy('members.membership_no')->get();

        $foodentries = FoodEntry::select('id', 'name', 'price', 'sub_name')->get();
        $paymentTypes = PaymentType::all();

        $member = Member::find($foodOrder->member_id);


        return view('app.food_orders.edit', compact('foodOrder', 'members', 'foodentries', 'member', 'paymentTypes'));
    }

    /**
     * @param \App\Http\Requests\FoodOrderUpdateRequest $request
     * @param \App\Models\FoodOrder $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodOrder $foodOrder) {

        abort_if($foodOrder->payment_status, 404);

        $this->authorize('update', $foodOrder);

        if($request->confirm_payment) {
            $member = Member::findOrFail($foodOrder->member_id);

            if($request->payment_type_id == 2) {
                if($member->balance >= $member->balance) $member_actual_limit = $member->balance ;
                else $member_actual_limit = $member->limit ;

                if($member_actual_limit >= $request->payable_amount) {
                    $foodOrder->net_sale_price = $foodOrder->payable_amount;
                } else {
                    return redirect()
                        ->route('food-orders.edit', $foodOrder)
                        ->withError('Not Enough Balance !');
                }
            }
            else {
                $commission_rate = PaymentType::find($request->payment_type_id)->commission_rate ?? 0;
                $commission = $foodOrder->payable_amount*$commission_rate/100;
                $foodOrder->net_sale_price = $foodOrder->payable_amount-$commission;
            }

            $foodOrder->payment_type_id = $request->payment_type_id;
            $foodOrder->payment_status = 'PAID';

            $foodOrder->update();

            //balance update
            $member->balance = $member->balance - $foodOrder->payable_amount;
            $member->update();
        }

        $menu_names = collect(json_decode($request->menu_names));

        $foodOrder->member_id = $request->member_id;
        $foodOrder->quantity = $menu_names->sum('q');
        $foodOrder->price = $menu_names->sum('p');

        $discount_rate = (float)$request->discount_rate;
        $foodOrder->discount_rate = $discount_rate;
        if($discount_rate) {
            $foodOrder->discount = $foodOrder->price*$discount_rate/100;
        }else $foodOrder->discount = 0;

        $special_discount_rate = (float)$request->special_discount_rate;
        $foodOrder->special_discount_rate = $special_discount_rate;
        if($special_discount_rate) {
            $foodOrder->special_discount = $foodOrder->price*$special_discount_rate/100;
        }else $foodOrder->special_discount = 0;


        $foodOrder->discounted_price = $foodOrder->price - ($foodOrder->discount + $foodOrder->special_discount);

        $vat_rate = (float)$request->vat_rate;
        $foodOrder->vat_rate = $vat_rate;
        if($vat_rate) {
            $foodOrder->vat = $foodOrder->discounted_price*($vat_rate)/100;
        }else $foodOrder->vat = 0;

        $foodOrder->payment_type_id = empty($request->payment_type_id)? null: $request->payment_type_id;
        $foodOrder->payable_amount = $foodOrder->discounted_price + $foodOrder->vat;
        $foodOrder->mobile = $request->mobile;
        $foodOrder->menu_names = $menu_names;

        $foodOrder->update();

        return redirect()
            ->route('food-orders.edit', $foodOrder)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodOrder $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FoodOrder $foodOrder)
    {
        $this->authorize('delete', $foodOrder);

        $foodOrder->delete();

        return redirect()
            ->route('food-orders.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
