@php
    $total = 0;
    $total_vat = 0;
    $total_discount = 0;
    $total_payable_amount = 0;
    $total_commission = 0;
    $total_cash_recieved = 0;
    $total_recieved_bank = 0;
@endphp
<table  style="font-size:7px !important;" border="0.0" align = "" width="100%" cellpadding="2" cellspacing="0"; >
    <thead>
    <tr>
        <td width="10%" align = "left">
            <div class="invoice-logo"><img width="100" src="{{ 'images/logo.png' }}" alt="Invoice logo"></div>
        </td>


        <td align="center"style="width:90%">

            <h2>World Travelr's Club</h2>
            <span style="font-size: 10px; color: blue">{!! $heading !!}</span>
            <br>
        </td>
    </tr>

    <tr align="center" style="font-size: 8px; font-weight: bold;background-color: #d2ff4d">
        <th width="08%" border="0.5">Sl</th>
        <th width="10%" border="0.5">Bill / Trans. No</th>
        <th width="10%" border="0.5">Member ID</th>
        <th width="08%" border="0.5">VAT </th>
        <th width="08%" border="0.5">Discount</th>
        <th width="10%" border="0.5">Amount Rec.</th>
        <th width="10%" border="0.5">Paid Status</th>

        <th width="10%" border="0.5">Payment Bank commission</th>

        <th width="10%" border="0.5">Cash Received</th>
        <th width="10%" border="0.5">Received at Bank</th>



    </tr>
    </thead>

    <tbody>


    @forelse($dailyReports as $item)
        <tr>
            <td width="08%" border = "0.5">{{ $loop->index+1 }}</td>
            <td width="10%" border = "0.5">{{ '-' }}</td>
            <td width="10%" border = "0.5">{{ \App\Models\Member::find($item->member_id)->membership_no ?? '-'}}</td>
            <td width="08%" border = "0.5" align = "right">{{ $item->vat }}</td>
            <td width="08%" border = "0.5" align = "right">{{ $item->discount }}</td>
            <td width="10%" border = "0.5" align = "right">{{ $item->payable_amount }}</td>
            <td width="10%" border = "0.5">{{ \App\Models\PaymentType::find($item->payment_type_id)->name ?? '-' }}</td>
            <td width="10%" border = "0.5"  align = "right">{{ $item->payable_amount-$item->net_sale_price }}</td>
            <td width="10%" border = "0.5"  align = "right">{{ $item->net_sale_price }}</td>
            <td width="10%" border = "0.5">{{ '-' }}</td>

        </tr>
        @php
            $total_vat = $total_vat +  $item->vat;
            $total_discount = $total_discount +  $item->discount;
            $total_payable_amount = $total_payable_amount + $item->payable_amount;
            $total_cash_recieved  = $total_cash_recieved + $item->net_sale_price;
            $commision = $item->payable_amount-$item->net_sale_price;
            $total_commission = $total_commission + $commision;
            $total_recieved_bank = $total_recieved_bank;
        @endphp

        @endforeach
        <tr>
            <td width="28%" border = "0.5" colspan = "3" >Total</td>
            <td width="08%" border = "0.5" align = "right">{{ number_format($total_vat,2) }}</td>
            <td width="08%" border = "0.5" align = "right">{{ number_format($total_discount,2) }}</td>
            <td width="10%" border = "0.5" align = "right">{{ number_format($total_payable_amount,2) }}</td>
            <td width="10%" border = "0.5"></td>
            <td width="10%" border = "0.5" align = "right">{{ number_format($total_commission,2) }}</td>
            <td width="10%" border = "0.5" align = "right">{{ number_format($total_cash_recieved,2) }}</td>
            <td width="10%" border = "0.5" align = "right">{{ $total_recieved_bank }}</td>

        </tr>


    </tbody>

</table>
<footer style="text-align: center; padding-top: 20px">Developed by Traveltech.digital</footer>
