<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('sales-report') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.reports.index_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('sales-report') }}"
                class="mt-4"
            >
                @include('app.report.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('food-orders.index') }}"
                        class="btn btn-light"
                    >
                        <i class="fa fa-arrow-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fa fa-floppy-disk"></i>
                        @lang('crud.reports.show')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-app>
