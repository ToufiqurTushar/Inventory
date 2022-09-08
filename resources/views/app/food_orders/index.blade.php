<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.food_orders.index_title')
                </h4>
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
                        @can('create', App\Models\FoodOrder::class)
                        <a
                            href="{{ route('food-orders.create') }}"
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.quantity')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.discount')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.price')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.special_discount')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.discounted_price')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.vat_rate')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.vat')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_orders.inputs.mobile')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_orders.inputs.menu_names')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.payable_amount')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_orders.inputs.payment_type')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_orders.inputs.payment_status')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_orders.inputs.net_sale_price')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_orders.inputs.created_by_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($foodOrders as $foodOrder)
                        <tr>
                            <td>{{ $foodOrder->quantity ?? '-' }}</td>
                            <td>{{ $foodOrder->discount ?? '-' }}</td>
                            <td>{{ $foodOrder->price ?? '-' }}</td>
                            <td>{{ $foodOrder->special_discount ?? '-' }}</td>
                            <td>{{ $foodOrder->discounted_price ?? '-' }}</td>
                            <td>{{ $foodOrder->vat_rate ?? '-' }}</td>
                            <td>{{ $foodOrder->vat ?? '-' }}</td>
                            <td>{{ $foodOrder->mobile ?? '-' }}</td>
                            <td>
                                <pre>
{{ json_encode($foodOrder->menu_names) ?? '-' }}</pre
                                >
                            </td>
                            <td>{{ $foodOrder->payable_amount ?? '-' }}</td>
                            <td>{{ $foodOrder->payment_type ?? '-' }}</td>
                            <td>{{ $foodOrder->payment_status ?? '-' }}</td>
                            <td>{{ $foodOrder->net_sale_price ?? '-' }}</td>
                            <td>{{ $foodOrder->created_by_id ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $foodOrder)
                                    <a
                                        href="{{ route('food-orders.edit', $foodOrder) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="fa fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $foodOrder)
                                    <a
                                        href="{{ route('food-orders.show', $foodOrder) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $foodOrder)
                                    <form
                                        action="{{ route('food-orders.destroy', $foodOrder) }}"
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
                            <td colspan="15">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15">{!! $foodOrders->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app>
