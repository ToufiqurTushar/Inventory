@php $editing = isset($memberType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $memberType->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name_bn"
            label="Name Bn"
            value="{{ old('name_bn', ($editing ? $memberType->name_bn : '')) }}"
            maxlength="255"
            placeholder="Name Bn"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
