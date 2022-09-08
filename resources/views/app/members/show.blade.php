<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('members.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.members.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.name')</h5>
                    <span>{{ $member->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.email')</h5>
                    <span>{{ $member->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.phone')</h5>
                    <span>{{ $member->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $member->image ? \Storage::url($member->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.membership_no')</h5>
                    <span>{{ $member->membership_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.membership_type_id')</h5>
                    <span
                        >{{ optional($member->membershipType)->type ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.balance')</h5>
                    <span>{{ $member->balance ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.limit')</h5>
                    <span>{{ $member->limit ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.created_by_id')</h5>
                    <span>{{ $member->created_by_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('members.index') }}" class="btn btn-light">
                    <i class="fa fa-arrow-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Member::class)
                <a href="{{ route('members.create') }}" class="btn btn-light">
                    <i class="fa fa-plus"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-app>
