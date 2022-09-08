<?php

namespace App\Http\Controllers;

use App\Models\FoodEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FoodEntryStoreRequest;
use App\Http\Requests\FoodEntryUpdateRequest;

class FoodEntryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', FoodEntry::class);

        $search = $request->get('search', '');

        $foodEntries = FoodEntry::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.food_entries.index', compact('foodEntries', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', FoodEntry::class);

        return view('app.food_entries.create');
    }

    /**
     * @param \App\Http\Requests\FoodEntryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodEntryStoreRequest $request)
    {
        $this->authorize('create', FoodEntry::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $foodEntry = FoodEntry::create($validated);


        return redirect()
            ->route('food-entries.edit', $foodEntry)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodEntry $foodEntry
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FoodEntry $foodEntry)
    {
        $this->authorize('view', $foodEntry);

        return view('app.food_entries.show', compact('foodEntry'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodEntry $foodEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FoodEntry $foodEntry)
    {
        $this->authorize('update', $foodEntry);

        return view('app.food_entries.edit', compact('foodEntry'));
    }

    /**
     * @param \App\Http\Requests\FoodEntryUpdateRequest $request
     * @param \App\Models\FoodEntry $foodEntry
     * @return \Illuminate\Http\Response
     */
    public function update(
        FoodEntryUpdateRequest $request,
        FoodEntry $foodEntry
    ) {
        $this->authorize('update', $foodEntry);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($foodEntry->image) {
                Storage::delete($foodEntry->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $foodEntry->update($validated);

        return redirect()
            ->route('food-entries.edit', $foodEntry)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodEntry $foodEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FoodEntry $foodEntry)
    {
        $this->authorize('delete', $foodEntry);

        if ($foodEntry->image) {
            Storage::delete($foodEntry->image);
        }

        $foodEntry->delete();

        return redirect()
            ->route('food-entries.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
