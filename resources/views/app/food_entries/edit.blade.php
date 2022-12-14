<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-entries.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.food_entries.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('food-entries.update', $foodEntry) }}"
                has-files
                class="mt-4"
            >
                @include('app.food_entries.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('food-entries.index') }}"
                        class="btn btn-light"
                    >
                        <i class="fa fa-arrow-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('food-entries.create') }}"
                        class="btn btn-light"
                    >
                        <i class="fa fa-plus text-primary"></i>
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
