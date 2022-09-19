<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    Today Sales Report
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                SL
                            </th>
                            <th class="text-right">
                                Bill / Transaction number
                            </th>
                            <th class="text-center">
                                Member ID
                            </th>
                            <th class="text-center">
                                Bill Amount
                            </th>
                            <th class="text-center">
                                VAT
                            </th>
                            <th class="text-center">
                                Discount
                            </th>
                            <th class="text-center">
                                Amount Receivable
                            </th>
                            <th class="text-center">
                                Paid Status
                            </th>
                            <th class="text-center">
                                Payment Bank commission
                            </th>
                            <th class="text-center">
                                Cash Received
                            </th>
                            <th class="text-center">
                                Received at Bank
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dailyReports as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ '-' }}</td>
                            <td>{{ \App\Models\Member::find($item->member_id)->membership_no ?? '-'}}</td>
                            <td>{{ $item->payable_amount }}</td>
                            <td>{{ $item->vat }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->payable_amount }}</td>
                            <td>{{ \App\Models\PaymentType::find($item->payment_type_id)->name ?? '-' }}</td>
                            <td>{{ $item->payable_amount-$item->net_sale_price }}</td>
                            <td>{{ $item->net_sale_price }}</td>
                            <td>{{ '-' }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app>
