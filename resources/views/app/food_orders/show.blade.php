<x-app>
{{--<div class="container">
   <div class="row">
            <div class="col-md-10">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- Start .row -->
                            <div class="col-lg-6">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-logo"><img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"></div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-6">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-from">
                                    <ul class="list-unstyled text-right">
                                        <li>Dash LLC</li>
                                        <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                        <li>Austin TX 78754</li>
                                        <li>VAT Number EU826113958</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="invoice-details mt25">
                                    <div class="well">
                                        <ul class="list-unstyled mb0">
                                            <li><strong>Invoice</strong> #936988</li>
                                            <li><strong>Invoice Date:</strong> Monday, October 10th, 2015</li>
                                            <li><strong>Due Date:</strong> Thursday, December 1th, 2015</li>
                                            <li><strong>Status:</strong> <span class="label label-danger">UNPAID</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-to mt25">
                                    <ul class="list-unstyled">
                                        <li><strong>Invoiced To</strong></li>
                                        <li>Jakob Smith</li>
                                        <li>Roupark 37</li>
                                        <li>New York, NY, 2014</li>
                                        <li>USA</li>
                                    </ul>
                                </div>
                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="per70 text-center">Description</th>
                                                <th class="per5 text-center">Qty</th>
                                                <th class="per25 text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1024MB Cloud 2.0 Server - elisium.dynamic.com (12/04/2014 - 01/03/2015)</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">$25.00 USD</td>
                                            </tr>
                                            <tr>
                                                <td>Logo design</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">$200.00 USD</td>
                                            </tr>
                                            <tr>
                                                <td>Backup - 1024MB Cloud 2.0 Server - elisium.dynamic.com</td>
                                                <td class="text-center">12</td>
                                                <td class="text-center">$12.00 USD</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-right">Sub Total:</th>
                                                <th class="text-center">$237.00 USD</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-right">20% VAT:</th>
                                                <th class="text-center">$47.40 USD</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-right">Credit:</th>
                                                <th class="text-center">$00.00 USD</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-right">Total:</th>
                                                <th class="text-center">$284.4.40 USD</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="invoice-footer mt25">
                                    <p class="text-center">Generated on Monday, October 08th, 2015 <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                                </div>
                            </div>
                            <!-- col-lg-12 end here -->
                        </div>
                        <!-- End .row -->
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- col-lg-12 end here -->
        </div>
</div>--}}
<div class="container p-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('food-orders.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                Bill Copy
            </h4>

            <div class="mt-4">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <div class="invoice-logo"><img width="170" src="{{ asset('images/logo.png') }}" alt="Invoice logo"></div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled text-end">
                            <li>World Travellers Club Ltd.</li>
                            <li>Gulshan 1, Dhaka</li>
                            <li>Bangladesh</li>
                            <li>VAT Number EU826113958</li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="invoice-details mt-5">
                            <div class="invoice">
                                <ul class="list-unstyled">
                                    <li><strong>Invoice</strong> #936988</li>
                                    <li><strong>Invoice Date:</strong> {{  date_format(date_create($foodOrder->created_at ?? now()), 'l, F jS, Y') }}</li>
                                    <li><strong>Due Date:</strong> {{  date_format(date_create($foodOrder->created_at ?? now()), 'l, F jS, Y') }}</li>
                                    <li><strong>Status:</strong> <span class="badge bg-danger">UNPAID</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-to mt-5">
                            <ul class="list-unstyled">
                                <li><strong>Invoiced To</strong></li>
                                <li>{{ \App\Models\Customer::find(\App\Models\Member::find($foodOrder->member_id)->customer_id)->name ?? '-' }}</li>
                                <li>Gulshan 1</li>
                                <li>Dhaka</li>
                                <li>Bangladesh</li>
                            </ul>
                        </div>
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="70%">Description</th>
                                        <th width="5%" class="per5 text-center">Qty</th>
                                        <th width="10%" class="per5 text-center">Rate</th>
                                        <th width="10%" class="per25 text-center">Total</th>
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
                                    @if(count($foodOrder->menu_names) < 10)
                                        @foreach(array_fill(0, 10-count($foodOrder->menu_names), 0) as $item)
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
                                    <tr>
                                        <th colspan="3" class="text-right">15% VAT:</th>
                                        <th class="text-center">৳ {{ $vat }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Discount:</th>
                                        <th class="text-center">৳ {{ $foodOrder->discount }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Bill Amount:</th>
                                        <th class="text-center">৳ {{ $bill }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Credit:</th>
                                        <th class="text-center">৳ {{ $balance }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Total:</th>
                                        <th class="text-center">৳ {{ $total }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt-5">
                            <p class="text-center h4">Thanks for comming</a></p>
                            <p class="text-center mt-5 pt-5">Generated on {{  date_format(date_create($foodOrder->created_at ?? now()), 'l, F jS, Y') }} <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
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
</x-app>
