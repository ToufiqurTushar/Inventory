<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StockInStoreRequest;
use App\Http\Requests\StockInUpdateRequest;

class StockInController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StockIn::class);

        $search = $request->get('search', '');

        $stocksIn = StockIn::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.stocks_in.index', compact('stocksIn', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', StockIn::class);

        return view('app.stocks_in.create');
    }

    /**
     * @param \App\Http\Requests\StockInStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockInStoreRequest $request)
    {
        $this->authorize('create', StockIn::class);

        $validated = $request->validated();
        if ($request->hasFile('product_image')) {
            $validated['product_image'] = $request
                ->file('product_image')
                ->store('public');
        }

        $stockIn = StockIn::create($validated);

        return redirect()
            ->route('stocks-in.edit', $stockIn)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockIn $stockIn
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StockIn $stockIn)
    {
        $stockIn = StockIn::find($request->stocks_in);
        $this->authorize('view', $stockIn);

        return view('app.stocks_in.show', compact('stockIn'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockIn $stockIn
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StockIn $stockIn)
    {
        $stockIn = StockIn::find($request->stocks_in);
        $this->authorize('update', $stockIn);

        return view('app.stocks_in.edit', compact('stockIn'));
    }

    /**
     * @param \App\Http\Requests\StockInUpdateRequest $request
     * @param \App\Models\StockIn $stockIn
     * @return \Illuminate\Http\Response
     */
    public function update(StockInUpdateRequest $request, StockIn $stockIn)
    {
        $stockIn = StockIn::find($request->stocks_in);
        $this->authorize('update', $stockIn);

        $validated = $request->validated();
        if ($request->hasFile('product_image')) {
            if ($stockIn->product_image) {
                Storage::delete($stockIn->product_image);
            }

            $validated['product_image'] = $request
                ->file('product_image')
                ->store('public');
        }

        $stockIn->update($validated);

        return redirect()
            ->route('stocks-in.edit', $stockIn)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockIn $stockIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StockIn $stockIn)
    {
        $stockIn = StockIn::find($request->stocks_in);
        $this->authorize('delete', $stockIn);

        if ($stockIn->product_image) {
            Storage::delete($stockIn->product_image);
        }

        $stockIn->delete();

        return redirect()
            ->route('stocks-in.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
