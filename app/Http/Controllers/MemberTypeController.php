<?php

namespace App\Http\Controllers;

use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Http\Requests\MemberTypeStoreRequest;
use App\Http\Requests\MemberTypeUpdateRequest;

class MemberTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', MemberType::class);

        $search = $request->get('search', '');

        $memberTypes = MemberType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.member_types.index', compact('memberTypes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', MemberType::class);

        return view('app.member_types.create');
    }

    /**
     * @param \App\Http\Requests\MemberTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberTypeStoreRequest $request)
    {
        $this->authorize('create', MemberType::class);

        $validated = $request->validated();

        $memberType = MemberType::create($validated);

        return redirect()
            ->route('member-types.edit', $memberType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MemberType $memberType)
    {
        $this->authorize('view', $memberType);

        return view('app.member_types.show', compact('memberType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MemberType $memberType)
    {
        $this->authorize('update', $memberType);

        return view('app.member_types.edit', compact('memberType'));
    }

    /**
     * @param \App\Http\Requests\MemberTypeUpdateRequest $request
     * @param \App\Models\MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function update(
        MemberTypeUpdateRequest $request,
        MemberType $memberType
    ) {
        $this->authorize('update', $memberType);

        $validated = $request->validated();

        $memberType->update($validated);

        return redirect()
            ->route('member-types.edit', $memberType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MemberType $memberType)
    {
        $this->authorize('delete', $memberType);

        $memberType->delete();

        return redirect()
            ->route('member-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
