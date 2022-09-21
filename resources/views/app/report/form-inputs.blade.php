<div class="row">
<x-inputs.group class="col-lg-4">
                <x-inputs.select x-model="report_type" name="report_type" label="Report Type">
                    
                    <option value="">Please select</option>
                    
                        <option value="whole_sales">Whole Sales Report</option>
                        <option value="payment_sales">Payment Wise Report</option>
                    
                </x-inputs.select>
</x-inputs.group>

    <x-inputs.group class="col-lg-4">
        <x-inputs.date
            name="from_date"
            label="Select From Date"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-lg-4">
        <x-inputs.date
            name="to_date"
            label="Select To Date"
            required
        ></x-inputs.date>
    </x-inputs.group>

</div>
