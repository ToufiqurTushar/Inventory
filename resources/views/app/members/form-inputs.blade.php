@php $editing = isset($member) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="customer_id" label="Customer" required>
            @php $selected = old('customer_id', ($editing ? $member->customer_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Customer</option>
            @foreach($customers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="member_type_id" label="Member Type" required>
            @php $selected = old('member_type_id', ($editing ? $member->member_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Member Type</option>
            @foreach($memberTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="card_no"
            label="Card No"
            value="{{ old('card_no', ($editing ? $member->card_no : '')) }}"
            maxlength="255"
            placeholder="Card No"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
