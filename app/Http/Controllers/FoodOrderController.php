<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
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

        return view('app.food_orders.create');
    }

    /**
     * @param \App\Http\Requests\FoodOrderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodOrderStoreRequest $request)
    {
        $this->authorize('create', FoodOrder::class);

        $validated = $request->validated();

        $foodOrder = FoodOrder::create($validated);

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

        return view('app.food_orders.edit', compact('foodOrder'));
    }

    /**
     * @param \App\Http\Requests\FoodOrderUpdateRequest $request
     * @param \App\Models\FoodOrder $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function update(
        FoodOrderUpdateRequest $request,
        FoodOrder $foodOrder
    ) {
        $this->authorize('update', $foodOrder);

        $validated = $request->validated();

        $foodOrder->update($validated);

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
