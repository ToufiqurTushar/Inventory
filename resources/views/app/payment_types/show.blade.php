<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('payment-types.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.payment_types.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.payment_types.inputs.name')</h5>
                    <span>{{ $paymentType->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.payment_types.inputs.commission_rate')</h5>
                    <span>{{ $paymentType->commission_rate ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('payment-types.index') }}"
                    class="btn btn-light"
                >
                    <i class="fa fa-arrow-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\PaymentType::class)
                <a
                    href="{{ route('payment-types.create') }}"
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
