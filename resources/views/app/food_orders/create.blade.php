<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-orders.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.food_orders.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('food-orders.store') }}"
                class="mt-4"
            >
                @include('app.food_orders.form-inputs')

            </x-form>
        </div>
    </div>
</div>
</x-app>
