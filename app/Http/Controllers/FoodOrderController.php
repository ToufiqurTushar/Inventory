<?php

namespace App\Http\Controllers;

use App\Models\FoodEntry;
use App\Models\FoodOrder;
use App\Models\Member;
use App\Models\MemberType;
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

        $members = Member::join('customers', 'customers.id', '=', 'members.customer_id')
            ->pluck('customers.name', 'members.customer_id');

        $foodentries = FoodEntry::select('id', 'product_name', 'sale_cost', 'member_discount')->get();

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
        $foodOrder->discount = $menu_names->sum('d');
        $foodOrder->price = $menu_names->sum('p');
        $foodOrder->total = $menu_names->sum('t');
        $foodOrder->menu_names = $menu_names;
        $foodOrder->mobile = $request->mobile;
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

        $members = Member::join('customers', 'customers.id', '=', 'members.customer_id')
            ->pluck('customers.name', 'members.customer_id');

        $foodentries = FoodEntry::select('id', 'product_name', 'sale_cost', 'member_discount')->get();

        return view('app.food_orders.edit', compact('foodOrder','foodentries', 'members'));
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
        $foodOrder->discount = $menu_names->sum('d');
        $foodOrder->price = $menu_names->sum('p');
        $foodOrder->total = $menu_names->sum('t');
        $foodOrder->menu_names = $menu_names;
        $foodOrder->mobile = $request->mobile;
        $foodOrder->created_by_id = auth()->id();
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
