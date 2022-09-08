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
                    <h5>@lang('crud.food_entries.inputs.name')</h5>
                    <span>{{ $foodEntry->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.sub_name')</h5>
                    <span>{{ $foodEntry->sub_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.name_bn')</h5>
                    <span>{{ $foodEntry->name_bn ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.sub_name_bn')</h5>
                    <span>{{ $foodEntry->sub_name_bn ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $foodEntry->image ? \Storage::url($foodEntry->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.price')</h5>
                    <span>{{ $foodEntry->price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_entries.inputs.discounted_price')</h5>
                    <span>{{ $foodEntry->discounted_price ?? '-' }}</span>
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
