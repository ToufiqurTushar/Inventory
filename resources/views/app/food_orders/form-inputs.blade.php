@php $editing = isset($foodOrder) @endphp

<div class="row" x-data="init_()">
    <x-inputs.group class="col-lg-6">
        <x-inputs.select name="member_id" label="Member" required>
            @php $selected = $editing ? $foodOrder->member_id : '' @endphp
            <option value="">Please select Members</option>
            @foreach($members as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <h5 class="">Selected Food Items</h5>
    <template x-for="item, index in menu_names" :key="index">
        <div>
            <div class="d-flex">
                <div class="row flex-grow-1">
                    <x-inputs.group class="col">
                        <input
                            name="menu_name"
                            class="form-control"
                            :value="item.f"
                            readonly
                        >
                    </x-inputs.group>

                    <x-inputs.group class="col">
                        <input
                            name="quantity"
                            class="form-control"
                            :value="item.q"
                            readonly
                        >
                    </x-inputs.group>

                    <x-inputs.group class="col">
                        <input
                            name="price"
                            class="form-control"
                            :value="item.p"
                            readonly
                        >
                    </x-inputs.group>

                    <x-inputs.group class="col">
                        <input
                            name="discount"
                            class="form-control"
                            :value="item.d"
                            readonly
                        >
                    </x-inputs.group>

                    <x-inputs.group class="col">
                        <input
                            name="total"
                            class="form-control"
                            :value="item.t"
                            readonly
                        >
                    </x-inputs.group>
                </div>
                <div class="ps-3">
                    <button type="button" class="btn btn-danger float-right" @click="removeMenuName(index)">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    </template>
    <template x-if="grand_total > 0">
        <div class="">
            <div class="text-end">
                <h5>Price: <span x-text="grand_price"></span></h5>
                <h5>Discount: <span x-text="grand_discount"></span></h5>
                <h5>Total: <span x-text="grand_total"></span></h5>
            </div>
            <hr>
        </div>
    </template>

    <div class="d-flex bd-highlight">
        <div class="row flex-grow-1">
            <x-inputs.group class="col">
                <x-inputs.select @change="selectFoodItem($event.target.value)" name="food_entry_id" x-model="food_entry_id" label="Menu Name">
                    <option value="">Select Menu</option>
                    @foreach($foodentries as $item)
                        <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                    @endforeach
                </x-inputs.select>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    @input="inputQuantity()"
                    x-model="quantity"
                    name="quantity"
                    label="Quantity"
                    step="0"
                    min="1"
                    x-bind:readonly="food_entry_id == '' || food_entry_id == null"
                ></x-inputs.number>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    x-model="price"
                    name="price"
                    label="Price"
                    step="0.01"
                    readonly
                ></x-inputs.number>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    x-model="discount"
                    name="discount"
                    label="Discount"
                    step="0.01"
                    readonly
                ></x-inputs.number>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    x-model="total"
                    name="total"
                    label="Total"
                    step="0.01"
                    readonly
                ></x-inputs.number>
            </x-inputs.group>

        </div>
        <div class="ps-3">
            <button type="button" class="btn btn-primary float-right mt-4" @click="addMenuName()">
                <i class="fa fa-plus"></i>
            </button>
        </div>

    </div>

    <input x-model="menu_names_json" name="menu_names" type="hidden">

    <x-inputs.group class="col-lg-6">
        <x-inputs.text
            name="mobile"
            label="Mobile"
            maxlength="255"
            placeholder="Mobile"
            :value="old('mobile', ($editing ? $foodOrder->mobile : ''))"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <div class="mt-4">
        <a
            href="{{ route('food-orders.index') }}"
            class="btn btn-light"
        >
            <i class="fa fa-arrow-left text-primary"></i>
            @lang('crud.common.back')
        </a>

        <button type="submit" class="btn btn-primary float-right" x-bind:disabled="menu_names.length == 0">
            <i class="fa fa-floppy-disk"></i>
            {{ $editing ? "Update" : 'Create'}}
        </button>
    </div>

    <script>
        function init_() {
            return {
                food_entries : @json($foodentries?? 'null'),
                menu_names: @json($foodOrder->menu_names??[]),
                menu_names_json: JSON.stringify(@json($foodOrder->menu_names??[])),
                food_entry_id: null,
                food_entry: null,
                quantity: null,
                price: null,
                discount: null,
                total: null,
                grand_price: {{ $editing ? $foodOrder->price : 'null' }},
                grand_discount: {{ $editing ? $foodOrder->discount : 'null' }},
                grand_total: {{ $editing ? $foodOrder->total : 'null' }},
                selectFoodItem(item_id) {
                    this.calculateItemPrice(item_id);
                },
                inputQuantity() {
                    if(this.quantity < 1) {
                        this.quantity = null;
                        return;
                    }
                    this.calculateItemPrice(this.food_entry_id);
                },
                addMenuName() {
                    if(this.food_entry_id != null && this.quantity != null && this.discount != null) {
                        this.menu_names.push({
                            "id": this.food_entry_id,
                            "f": $("select[name=food_entry_id] option:selected").text(),
                            "q": this.quantity,
                            "p": this.price,
                            "d": this.discount,
                            "t": this.total,
                        });
                        this.menu_names_json = JSON.stringify(this.menu_names);
                        this.food_entry_id = null;
                        this.food_entry = null;
                        this.quantity = null;
                        this.price = null;
                        this.discount = null;
                        this.total = null;
                        this.calculateGrandPrice();
                    }
                },
                removeMenuName(index) {
                    this.menu_names.splice(index, 1);
                    this.menu_names_json = JSON.stringify(this.menu_names);
                    this.calculateGrandPrice();
                },
                calculateItemPrice(selected_food_entry_id) {
                    let food_item = this.food_entries.filter(function(item){
                        return item.id == selected_food_entry_id;
                    })[0];

                    if(food_item && this.quantity) {
                        this.price = (food_item.sale_cost * this.quantity);
                        this.discount = this.price * food_item.member_discount / 100;
                        this.total = (food_item.sale_cost * this.quantity) - this.discount;
                    } else {
                        this.price = null;
                        this.discount = null;
                        this.total = null;
                    }
                },
                calculateGrandPrice() {
                    let grandPrice = 0;
                    let grandDiscount = 0;
                    let grandTotal = 0;
                    this.menu_names.forEach(function(item){
                        grandPrice += item.p;
                        grandDiscount += item.d;
                        grandTotal += item.t;
                    });
                    this.grand_price  = grandPrice;
                    this.grand_discount = grandDiscount;
                    this.grand_total = grandTotal;
                },
            };
        }

    </script>
</div>
