<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-orders.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.food_orders.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('food-orders.update', $foodOrder) }}"
                class="mt-4"
            >
                @include('app.food_orders.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('food-orders.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('food-orders.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fa fa-floppy-disk"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-app>
