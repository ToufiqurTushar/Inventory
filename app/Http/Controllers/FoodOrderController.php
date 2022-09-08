<?php

namespace App\Http\Controllers;

use App\Models\FoodEntry;
use App\Models\FoodOrder;
use App\Models\Member;
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

        return view('app.food_orders.create', compact('foodentries', 'members'));
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
        $foodOrder->net_sale_price = $foodOrder->payable_amount;
        $foodOrder->menu_names = $menu_names;
        $foodOrder->mobile = $request->mobile;
        $foodOrder->payment_type = null;
        $foodOrder->payment_status = $request->payment_status??null;

        $foodOrder->created_by_id = auth()->id();
        $foodOrder->save();

        return redirect()
            ->route('food-orders.edit', $foodOrder)
            ->withSuccess(__('crud.common.created'));
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
        $this->authorize('update', $foodOrder);

        $members = Member::join('membership_types', 'membership_types.id', '=', 'members.membership_type_id')
            ->select('members.name','members.phone','members.balance','members.limit', 'members.membership_no', 'members.id', 'membership_types.discount_rate')
            ->orderBy('members.membership_no')->get();

        $foodentries = FoodEntry::select('id', 'name', 'price', 'sub_name')->get();

        $member = Member::find($foodOrder->member_id);


        return view('app.food_orders.edit', compact('foodOrder', 'members', 'foodentries', 'member'));
    }

    /**
     * @param \App\Http\Requests\FoodOrderUpdateRequest $request
     * @param \App\Models\FoodOrder $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodOrder $foodOrder) {

        $this->authorize('update', $foodOrder);

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

        $foodOrder->payable_amount = $foodOrder->discounted_price + $foodOrder->vat;
        $foodOrder->net_sale_price = $foodOrder->payable_amount;
        $foodOrder->menu_names = $menu_names;
        $foodOrder->mobile = $request->mobile;
        $foodOrder->payment_type = $request->selected_payment_type??null;
        $foodOrder->payment_status = $request->payment_status??null;

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
