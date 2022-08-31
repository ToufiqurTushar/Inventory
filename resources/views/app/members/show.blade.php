<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('members.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.members.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.customer_id')</h5>
                    <span>{{ optional($member->customer)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.member_type_id')</h5>
                    <span
                        >{{ optional($member->memberType)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.members.inputs.card_no')</h5>
                    <span>{{ $member->card_no ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('members.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Member::class)
                <a href="{{ route('members.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-app>
