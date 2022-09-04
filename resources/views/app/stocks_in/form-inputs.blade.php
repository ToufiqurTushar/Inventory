@php $editing = isset($stockIn) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="product_name"
            label="Product Name"
            value="{{ old('product_name', ($editing ? $stockIn->product_name : '')) }}"
            maxlength="255"
            placeholder="Product Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="created_by_id"
            label="Created By Id"
            value="{{ old('created_by_id', ($editing ? $stockIn->created_by_id : '')) }}"
            maxlength="255"
            placeholder="Created By Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Product_type"
            label="Product Type"
            value="{{ old('Product_type', ($editing ? $stockIn->Product_type : '')) }}"
            maxlength="255"
            placeholder="Product Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="expiry_days"
            label="Expiry Days"
            value="{{ old('expiry_days', ($editing ? $stockIn->expiry_days : '')) }}"

            placeholder="Expiry Days"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="initial_stock"
            label="Initial Stock"
            value="{{ old('initial_stock', ($editing ? $stockIn->initial_stock : '')) }}"

            step="0.01"
            placeholder="Initial Stock"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="alerm_stock"
            label="Alerm Stock"
            value="{{ old('alerm_stock', ($editing ? $stockIn->alerm_stock : '')) }}"

            step="0.01"
            placeholder="Alerm Stock"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="m_by_u"
            label="M By U"
            value="{{ old('m_by_u', ($editing ? $stockIn->m_by_u : '')) }}"
            maxlength="255"
            placeholder="M By U"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $stockIn->product_image ? \Storage::url($stockIn->product_image) : '' }}')"
        >
            <x-inputs.partials.label
                name="product_image"
                label="Product Image"
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
                    name="product_image"
                    id="product_image"
                    @change="fileChosen"
                />
            </div>

            @error('product_image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>
