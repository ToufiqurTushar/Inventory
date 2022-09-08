@php $editing = isset($membershipType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            :value="old('type', ($editing ? $membershipType->type : ''))"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>


    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="discount_rate"
            label="Discount Rate"
            :value="old('discount_rate', ($editing ? $membershipType->discount_rate : '0'))"

            step="0.01"
            placeholder="Discount Rate"
            required
        ></x-inputs.number>
    </x-inputs.group>

</div>
