@php $editing = isset($foodOrder) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            :value="old('quantity', ($editing ? $foodOrder->quantity : ''))"

            step="0.01"
            placeholder="Quantity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="discount"
            label="Discount"
            :value="old('discount', ($editing ? $foodOrder->discount : ''))"

            step="0.01"
            placeholder="Discount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="created_by_id"
            label="Created By Id"
            :value="old('created_by_id', ($editing ? $foodOrder->created_by_id : ''))"
            maxlength="255"
            placeholder="Created By Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="price"
            label="Price"
            :value="old('price', ($editing ? $foodOrder->price : ''))"

            step="0.01"
            placeholder="Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="mobile"
            label="Mobile"
            :value="old('mobile', ($editing ? $foodOrder->mobile : ''))"
            maxlength="255"
            placeholder="Mobile"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="menu_names"
            label="Menu Names"
            maxlength="255"
            required
            >{{ old('menu_names', ($editing ?
            json_encode($foodOrder->menu_names) : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
