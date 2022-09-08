<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('membership-types.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.membership_types.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.membership_types.inputs.type')</h5>
                    <span>{{ $membershipType->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.membership_types.inputs.type_bn')</h5>
                    <span>{{ $membershipType->type_bn ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.membership_types.inputs.discount_rate')</h5>
                    <span>{{ $membershipType->discount_rate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.membership_types.inputs.created_by_id')</h5>
                    <span>{{ $membershipType->created_by_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('membership-types.index') }}"
                    class="btn btn-light"
                >
                    <i class="fa fa-arrow-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\MembershipType::class)
                <a
                    href="{{ route('membership-types.create') }}"
                    class="btn btn-light"
                >
                    <i class="fa fa-plus"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-app>
