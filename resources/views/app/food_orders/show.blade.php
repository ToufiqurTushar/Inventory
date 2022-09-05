<x-app>
<div class="container p-5">
    <div class="card p-2">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-orders.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                Bill Copy
            </h4>

            <div class="" id="printableArea">
                <div class="row h6">
                    <table class="table table-no-bordered">
                        <tr>
                            <td width="50%">
                                <div class="invoice-logo"><img width="150" src="{{ asset('images/logo.png') }}" alt="Invoice logo"></div>
                            </td>
                            <td width="50%">
                                <ul class="list-unstyled text-end">
                                    <li>World Travellers Club Ltd.</li>
                                    <li>Gulshan 1, Dhaka</li>
                                    <li>Bangladesh</li>
                                    <li>VAT Number EU826113958</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <ul class="list-unstyled">
                                    <li><strong>Invoice</strong> #936988</li>
                                    <li><strong>Invoice Date:</strong> {{  date_format(date_create($foodOrder->created_at ?? now()), 'l, F jS, Y') }}</li>
                                    <li><strong>Due Date:</strong> {{  date_format(date_create($foodOrder->created_at ?? now()), 'l, F jS, Y') }}</li>
                                    <li><strong>Status:</strong> <span class="badge bg-success">PAID</span></li>
                                </ul>
                            </td>
                            <td width="50%">
                                <ul class="list-unstyled">
                                    <li><strong>Invoiced To</strong></li>
                                    <li>{{ \App\Models\Customer::find(\App\Models\Member::find($foodOrder->member_id)->customer_id)->name ?? '-' }}</li>
                                    <li>{{ $foodOrder->mobile }}, Gulshan 1</li>
                                    <li>Dhaka, Bangladesh</li>
                                </ul>
                            </td>
                        </tr>
                    </table>

                    <div class="col-lg-12">
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="50%">Description</th>
                                        <th width="10%" class="per5 text-center">Qty</th>
                                        <th width="20%" class="per5 text-center">Rate</th>
                                        <th width="30%" class="per25 text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($foodOrder->menu_names as $item)
                                        <tr>
                                            <td>{{ $item['f'] }}</td>
                                            <td class="text-center">{{ $item['q'] }}</td>
                                            <td class="text-center">৳ {{ \App\Models\FoodEntry::find($item['id'])->sale_cost ?? '-' }}</td>
                                            <td class="text-center">৳ {{ $item['t'] }}</td>
                                        </tr>
                                    @endforeach
                                    @if(count($foodOrder->menu_names) < 2)
                                        @foreach(array_fill(0, 2-count($foodOrder->menu_names), 0) as $item)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    @php
                                        $vat = $foodOrder->price * 15 / 100 ;
                                        $balance = \App\Models\Customer::find(\App\Models\Member::find($foodOrder->member_id)->customer_id)->balance ?? 0;
                                        $bill = $foodOrder->price + $vat - $foodOrder->discount;
                                        $total = $bill - $balance;
                                    @endphp
                                    <tr>
                                        <th colspan="3" class="text-right">Sub Total:</th>
                                        <th class="text-center">৳ {{ $foodOrder->price }}</th>
                                    </tr>
                                    {{--<tr>
                                        <th colspan="3" class="text-right">15% VAT:</th>
                                        <th class="text-center">৳ {{ $vat }}</th>
                                    </tr>--}}
                                    <tr>
                                        <th colspan="3" class="text-right">Discount:</th>
                                        <th class="text-center">৳ {{ $foodOrder->discount }}</th>
                                    </tr>
                                    {{--<tr>
                                        <th colspan="3" class="text-right">Bill Amount:</th>
                                        <th class="text-center">৳ {{ $bill }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Credit:</th>
                                        <th class="text-center">৳ {{ $balance }}</th>
                                    </tr>--}}
                                    <tr>
                                        <th colspan="3" class="text-right">Total:</th>
                                        <th class="text-center">৳ {{ $foodOrder->total }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt-5">
                            <p class="text-center h4">Thanks for comming</a></p>
                            <p class="text-center mt-5 pt-5">Generated on {{  date_format(date_create($foodOrder->created_at ?? now()), 'l, F jS, Y') }} <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> <button class="btn" onclick="printableDiv('printableArea')">Print</button></a></p>
                        </div>
                    </div>
                </div>
                {{--<div class="mb-4">
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
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.mobile')</h5>
                    <span>{{ $foodOrder->mobile ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.food_orders.inputs.menu_names')</h5>
                    <pre>{{ json_encode($foodOrder->menu_names) ?? '-' }}</pre>
                </div>--}}
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('food-orders.index') }}"
                    class="btn btn-light"
                >
                    <i class="fa fa-arrow-left"></i>
                    @lang('crud.common.back')
                </a>

                {{--@can('create', App\Models\FoodOrder::class)
                <a
                    href="{{ route('food-orders.create') }}"
                    class="btn btn-light"
                >
                    <i class="fa fa-plus"></i> @lang('crud.common.create')
                </a>
                @endcan--}}
            </div>
        </div>
    </div>
</div>
    <script>
        function printableDiv(printableAreaDivId) {
            var printContents = document.getElementById(printableAreaDivId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</x-app>
