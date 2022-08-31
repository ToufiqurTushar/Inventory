<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-orders.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.food_orders.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.menu_name')</h5>
                    <span>{{ $foodOrder->menu_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.quantity')</h5>
                    <span>{{ $foodOrder->quantity ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.discount')</h5>
                    <span>{{ $foodOrder->discount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.created_by_id')</h5>
                    <span>{{ $foodOrder->created_by_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.price')</h5>
                    <span>{{ $foodOrder->price ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('food-orders.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\FoodOrder::class)
                <a
                    href="{{ route('food-orders.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-app>
