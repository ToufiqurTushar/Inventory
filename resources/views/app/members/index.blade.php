<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.members.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="fa fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Member::class)
                        <a
                            href="{{ route('members.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-plus"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.members.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.members.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.members.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.members.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.members.inputs.membership_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.members.inputs.membership_type_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.members.inputs.balance')
                            </th>
                            <th class="text-right">
                                @lang('crud.members.inputs.limit')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                        <tr>
                            <td>{{ $member->name ?? '-' }}</td>
                            <td>{{ $member->email ?? '-' }}</td>
                            <td>{{ $member->phone ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $member->image ? \Storage::url($member->image) : '' }}"
                                />
                            </td>
                            <td>{{ $member->membership_no ?? '-' }}</td>
                            <td>
                                {{ optional($member->membershipType)->type ??
                                '-' }}
                            </td>
                            <td>{{ $member->balance ?? '-' }}</td>
                            <td>{{ $member->limit ?? '-' }}</td>
                            <td>{{ $member->created_by_id ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $member)
                                    <a
                                        href="{{ route('members.edit', $member) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="fa fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $member)
                                    <a
                                        href="{{ route('members.show', $member) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $member)
                                    <form
                                        action="{{ route('members.destroy', $member) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="fa fa-trash-can"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $members->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app>
