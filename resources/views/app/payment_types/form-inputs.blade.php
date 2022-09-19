@php $editing = isset($paymentType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $paymentType->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="commission_rate"
            label="Commission Rate"
            :value="old('commission_rate', ($editing ? $paymentType->commission_rate : ''))"
            max="255"
            step="0.01"
            placeholder="Commission Rate"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
