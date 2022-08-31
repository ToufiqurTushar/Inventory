@php $editing = isset($foodOrder) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="menu_name"
            label="Menu Name"
            value="{{ old('menu_name', ($editing ? $foodOrder->menu_name : '')) }}"
            maxlength="255"
            placeholder="Menu Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            value="{{ old('quantity', ($editing ? $foodOrder->quantity : '')) }}"
            max="255"
            step="0.01"
            placeholder="Quantity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="discount"
            label="Discount"
            value="{{ old('discount', ($editing ? $foodOrder->discount : '')) }}"
            max="255"
            step="0.01"
            placeholder="Discount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="created_by_id"
            label="Created By Id"
            value="{{ old('created_by_id', ($editing ? $foodOrder->created_by_id : '')) }}"
            maxlength="255"
            placeholder="Created By Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="price"
            label="Price"
            value="{{ old('price', ($editing ? $foodOrder->price : '')) }}"
            max="255"
            step="0.01"
            placeholder="Price"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
