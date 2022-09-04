@php $editing = isset($customer) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $customer->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            value="{{ old('phone', ($editing ? $customer->phone : '')) }}"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $customer->email : '')) }}"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="balance"
            label="Balance"
            value="{{ old('balance', ($editing ? $customer->balance : '0')) }}"

            step="0.01"
            placeholder="Balance"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="created_by_id"
            label="Created By Id"
            value="{{ old('created_by_id', ($editing ? $customer->created_by_id : '')) }}"
            maxlength="255"
            placeholder="Created By Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
