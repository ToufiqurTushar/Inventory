<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipType;
use App\Http\Requests\MembershipTypeStoreRequest;
use App\Http\Requests\MembershipTypeUpdateRequest;

class MembershipTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', MembershipType::class);

        $search = $request->get('search', '');

        $membershipTypes = MembershipType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.membership_types.index',
            compact('membershipTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', MembershipType::class);

        return view('app.membership_types.create');
    }

    /**
     * @param \App\Http\Requests\MembershipTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembershipTypeStoreRequest $request)
    {
        $this->authorize('create', MembershipType::class);

        $validated = $request->validated();

        $membershipType = MembershipType::create($validated);

        return redirect()
            ->route('membership-types.edit', $membershipType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MembershipType $membershipType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MembershipType $membershipType)
    {
        $this->authorize('view', $membershipType);

        return view('app.membership_types.show', compact('membershipType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MembershipType $membershipType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MembershipType $membershipType)
    {
        $this->authorize('update', $membershipType);

        return view('app.membership_types.edit', compact('membershipType'));
    }

    /**
     * @param \App\Http\Requests\MembershipTypeUpdateRequest $request
     * @param \App\Models\MembershipType $membershipType
     * @return \Illuminate\Http\Response
     */
    public function update(
        MembershipTypeUpdateRequest $request,
        MembershipType $membershipType
    ) {
        $this->authorize('update', $membershipType);

        $validated = $request->validated();

        $membershipType->update($validated);

        return redirect()
            ->route('membership-types.edit', $membershipType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MembershipType $membershipType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MembershipType $membershipType)
    {
        $this->authorize('delete', $membershipType);

        $membershipType->delete();

        return redirect()
            ->route('membership-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
