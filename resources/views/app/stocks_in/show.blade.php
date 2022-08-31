<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('stocks-in.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.stocks_in.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.product_name')</h5>
                    <span>{{ $stockIn->product_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.created_by_id')</h5>
                    <span>{{ $stockIn->created_by_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.Product_type')</h5>
                    <span>{{ $stockIn->Product_type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.expiry_days')</h5>
                    <span>{{ $stockIn->expiry_days ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.initial_stock')</h5>
                    <span>{{ $stockIn->initial_stock ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.alerm_stock')</h5>
                    <span>{{ $stockIn->alerm_stock ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.m_by_u')</h5>
                    <span>{{ $stockIn->m_by_u ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stocks_in.inputs.product_image')</h5>
                    <x-partials.thumbnail
                        src="{{ $stockIn->product_image ? \Storage::url($stockIn->product_image) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('stocks-in.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\StockIn::class)
                <a href="{{ route('stocks-in.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-app>
