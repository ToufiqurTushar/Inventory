<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-entries.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.food_entries.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.product_name')</h5>
                    <span>{{ $foodEntry->product_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $foodEntry->image ? \Storage::url($foodEntry->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.production_cost')</h5>
                    <span>{{ $foodEntry->production_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.sale_cost')</h5>
                    <span>{{ $foodEntry->sale_cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.member_discount')</h5>
                    <span>{{ $foodEntry->member_discount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.special_discount')</h5>
                    <span>{{ $foodEntry->special_discount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.others_discount')</h5>
                    <span>{{ $foodEntry->others_discount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.created_by_id')</h5>
                    <span>{{ $foodEntry->created_by_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('food-entries.index') }}"
                    class="btn btn-light"
                >
                    <i class="fa fa-arrow-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\FoodEntry::class)
                <a
                    href="{{ route('food-entries.create') }}"
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
