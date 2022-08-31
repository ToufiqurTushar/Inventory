@php $editing = isset($foodEntry) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="product_name"
            label="Product Name"
            value="{{ old('product_name', ($editing ? $foodEntry->product_name : '')) }}"
            maxlength="255"
            placeholder="Product Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $foodEntry->image ? \Storage::url($foodEntry->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="production_cost"
            label="Production Cost"
            value="{{ old('production_cost', ($editing ? $foodEntry->production_cost : '')) }}"
            max="255"
            step="0.01"
            placeholder="Production Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="sale_cost"
            label="Sale Cost"
            value="{{ old('sale_cost', ($editing ? $foodEntry->sale_cost : '')) }}"
            max="255"
            step="0.01"
            placeholder="Sale Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="member_discount"
            label="Member Discount"
            value="{{ old('member_discount', ($editing ? $foodEntry->member_discount : '')) }}"
            max="255"
            step="0.01"
            placeholder="Member Discount"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="special_discount"
            label="Special Discount"
            value="{{ old('special_discount', ($editing ? $foodEntry->special_discount : '')) }}"
            max="255"
            step="0.01"
            placeholder="Special Discount"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="others_discount"
            label="Others Discount"
            value="{{ old('others_discount', ($editing ? $foodEntry->others_discount : '')) }}"
            max="255"
            step="0.01"
            placeholder="Others Discount"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="created_by_id"
            label="Created By Id"
            value="{{ old('created_by_id', ($editing ? $foodEntry->created_by_id : '')) }}"
            maxlength="255"
            placeholder="Created By Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
