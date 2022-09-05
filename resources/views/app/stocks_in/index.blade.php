<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.stocks_in.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="fa fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\StockIn::class)
                        <a
                            href="{{ route('stocks-in.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-plus"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.stocks_in.inputs.product_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.stocks_in.inputs.created_by_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.stocks_in.inputs.Product_type')
                            </th>
                            <th class="text-right">
                                @lang('crud.stocks_in.inputs.expiry_days')
                            </th>
                            <th class="text-right">
                                @lang('crud.stocks_in.inputs.initial_stock')
                            </th>
                            <th class="text-right">
                                @lang('crud.stocks_in.inputs.alerm_stock')
                            </th>
                            <th class="text-left">
                                @lang('crud.stocks_in.inputs.m_by_u')
                            </th>
                            <th class="text-left">
                                @lang('crud.stocks_in.inputs.product_image')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stocksIn as $stockIn)
                        <tr>
                            <td>{{ $stockIn->product_name ?? '-' }}</td>
                            <td>{{ $stockIn->created_by_id ?? '-' }}</td>
                            <td>{{ $stockIn->Product_type ?? '-' }}</td>
                            <td>{{ $stockIn->expiry_days ?? '-' }}</td>
                            <td>{{ $stockIn->initial_stock ?? '-' }}</td>
                            <td>{{ $stockIn->alerm_stock ?? '-' }}</td>
                            <td>{{ $stockIn->m_by_u ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $stockIn->product_image ? \Storage::url($stockIn->product_image) : '' }}"
                                />
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $stockIn)
                                    <a
                                        href="{{ route('stocks-in.edit', $stockIn) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="fa fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $stockIn)
                                    <a
                                        href="{{ route('stocks-in.show', $stockIn) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $stockIn)
                                    <form
                                        action="{{ route('stocks-in.destroy', $stockIn) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="fa fa-trash-can"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $stocksIn->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app>
