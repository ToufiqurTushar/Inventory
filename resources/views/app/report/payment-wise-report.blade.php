@php
    $total = 0;
    $total_vat_sum = 0;
    $total_discount_sum = 0;
    $total_order_sum = 0;
    $total_price_sum = 0;
    $total_cash_rcv_sum = 0;

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

        <th width="10%" border="0.5">Sl</th>
        <th width="15%" border="0.5">Payment Type</th>
        <th width="15%" border="0.5">Total Order</th>
        <th width="15%" border="0.5">Total Price </th>
        <th width="15%" border="0.5">Total Discount</th>
        <th width="15%" border="0.5">Total Vat</th>
        <th width="15%" border="0.5">Total Cash Received</th>


    </tr>
    </thead>

    <tbody>


    @forelse($dailyReports as $item)
        <tr>
            <td width="10%" border = "0.5">{{ $loop->index+1 }}</td>
            <td width="15%" border = "0.5" align = "right">{{ $item->name }}</td>
            <td width="15%" border = "0.5" align = "right">{{ $item->total_order }}</td>
            <td width="15%" border = "0.5" align = "right">{{ number_format($item->total_price,2) }}</td>
            <td width="15%" border = "0.5"  align = "right">{{ number_format($item->total_discount_price,2) }}</td>
            <td width="15%" border = "0.5"  align = "right">{{ number_format($item->total_vat,2) }}</td>
            <td width="15%" border = "0.5"  align = "right">{{ number_format($item->total_cash_rcv,2) }}</td>


        </tr>
        @php

            $total_vat_sum = $total_vat_sum + $item->total_vat;
            $total_discount_sum = $total_discount_sum + $item->total_discount_price;
            $total_order_sum = $total_order_sum + $item->total_order;
            $total_price_sum = $total_price_sum + $item->total_price;
            $total_cash_rcv_sum = $total_cash_rcv_sum + $item->total_cash_rcv;

        @endphp

        @endforeach

        <tr>
            <td width="25%" border = "0.5" colspan  = "2" >Total</td>
            <td width="15%" border = "0.5" align = "right">{{ $total_order_sum }}</td>
            <td width="15%" border = "0.5" align = "right">{{ number_format($total_price_sum,2) }}</td>
            <td width="15%" border = "0.5"  align = "right">{{ number_format($total_discount_sum,2) }}</td>
            <td width="15%" border = "0.5"  align = "right">{{ number_format($total_vat_sum,2) }}</td>
            <td width="15%" border = "0.5"  align = "right">{{ number_format($total_cash_rcv_sum,2) }}</td>


        </tr>
    </tbody>

</table>
<footer><center>Developed by Traveltech.digital</center></footer>
