<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MemberStoreRequest;
use App\Http\Requests\MemberUpdateRequest;

class MemberController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Member::class);

        $search = $request->get('search', '');

        $members = Member::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.members.index', compact('members', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Member::class);

        $membershipTypes = MembershipType::pluck('type', 'id');

        return view('app.members.create', compact('membershipTypes'));
    }

    /**
     * @param \App\Http\Requests\MemberStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberStoreRequest $request)
    {
        $this->authorize('create', Member::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $member = Member::create($validated);

        return redirect()
            ->route('members.edit', $member)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Member $member)
    {
        $this->authorize('view', $member);

        return view('app.members.show', compact('member'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Member $member)
    {
        $this->authorize('update', $member);

        $membershipTypes = MembershipType::pluck('type', 'id');

        return view('app.members.edit', compact('member', 'membershipTypes'));
    }

    /**
     * @param \App\Http\Requests\MemberUpdateRequest $request
     * @param \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberUpdateRequest $request, Member $member)
    {
        $this->authorize('update', $member);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::delete($member->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $member->update($validated);

        return redirect()
            ->route('members.edit', $member)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Member $member)
    {
        $this->authorize('delete', $member);

        if ($member->image) {
            Storage::delete($member->image);
        }

        $member->delete();

        return redirect()
            ->route('members.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
