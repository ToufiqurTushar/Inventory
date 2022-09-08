@php $editing = isset($foodOrder) @endphp

<div class="row" x-data="init_()">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select x-model="selected_member_id" @change="selectMemberItem($event.target.value)" name="member_id" label="Member" required>
            @php $selected = $editing ? $foodOrder->member_id : '' @endphp
            <option value="">Please select Member</option>
            @foreach($members as $item)
                <option value="{{ $item->id }}" {{ $selected ==  $item->id ? 'selected' : '' }}>{{ $item->membership_no }} - {{  $item->name }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            x-model.number="discount_rate"
            name="discount_rate"
            label="Discount (%)"
            class="form-control"
            placeholder="Discount"
            readonly
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            x-model.number="special_discount_rate"
            @input="inputAdditionalDiscount()"
            x-bind:readonly="selected_member_id == '' || selected_member_id == null"
            name="special_discount_rate"
            label="Additional Discount (%)"

            step="0.01"
            placeholder="Additional Discount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            x-model.number="vat_rate"
            @input="inputVat()"
            name="vat_rate"
            label="Vat (%)"

            step="0.01"
            placeholder="Vat (%)"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            x-model="mobile"
            x-bind:readonly="selected_member_id == '' || selected_member_id == null"
            name="mobile"
            label="Mobile"
            :value="old('mobile', ($editing ? $foodOrder->mobile : ''))"
            maxlength="255"
            placeholder="Mobile"
            required
        ></x-inputs.text>
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
                            :value="item.r"
                            readonly
                        >
                    </x-inputs.group>


                    <x-inputs.group class="col">
                        <input
                            name="total"
                            class="form-control"
                            :value="item.p"
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

    <template x-if="menu_names.length > 0">
        <div class="">
            <div class="text-end">
                <h6>Total Price: <span x-text="grand_price"></span></h6>
                <h6>Discount: <span x-text="'-'+grand_discount"></span></h6>
                <h6>Discounted Price: <span x-text="grand_discounted_price"></span></h6>
                <h6>Vat: <span x-text="grand_vat"></span></h6>
                <h5>Total: <span x-text="grand_total"></span></h5>

            </div>

            <div class="row">
                <x-inputs.group class="col-lg-3">
                    <x-inputs.select
                        x-model="selected_payment_type"
                        name="selected_payment_type"
                        label="Payment Type">
                        <option value="MemberBalance" selected>Member Balance</option>
                    </x-inputs.select>
                </x-inputs.group>
                <x-inputs.group class="col-lg-3">
                    <x-inputs.text
                        x-model.number="balance"
                        label="Balance"
                        name="balnnce"
                        class="form-control"
                        readonly
                    ></x-inputs.text>
                </x-inputs.group>
                <x-inputs.group class="col-lg-3">
                    <x-inputs.text
                        x-model.number="limit"
                        label="Limit"
                        name="limit"
                        class="form-control"
                        readonly
                    ></x-inputs.text>
                </x-inputs.group>
                <x-inputs.group class="col-lg-3">
                    <x-inputs.text
                        x-model.number="balance_after_payment"
                        label="Balance after payment"
                        name="balance_after_payment"
                        class="form-control"
                        readonly
                    ></x-inputs.text>
                </x-inputs.group>
            </div>

            <hr>
        </div>
    </template>


    <div class="d-flex bd-highlight">
        <div class="row flex-grow-1">
            <x-inputs.group class="col">
                <x-inputs.select
                    x-model="selected_food_entry_id"
                    x-bind:disabled="selected_member_id == '' || selected_member_id == null"
                    @change="selectFoodItem($event.target.value)"
                    name="selected_food_entry_id"
                    label="Menu Name">
                    <option value="">Select Menu</option>
                    @foreach($foodentries as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} {{ $item->sub_name ? '-'.$item->sub_name : '' }}</option>
                    @endforeach
                </x-inputs.select>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    @input="inputQuantity()"
                    x-model="selected_food_quantity"
                    name="selected_food_quantity"
                    label="Quantity"
                    step="0"
                    min="1"
                    x-bind:readonly="selected_food_entry_id == '' || selected_food_entry_id == null"
                ></x-inputs.number>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    x-model="selected_food_rate"
                    name="selected_food_rate"
                    label="Rate"
                    step="0.01"
                    readonly
                ></x-inputs.number>
            </x-inputs.group>

            <x-inputs.group class="col">
                <x-inputs.number
                    x-model="selected_food_total_price"
                    name="selected_food_total_price"
                    label="Price"
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
            {{ $editing ? "Update Order" : 'Create Order'}}
        </button>

        @if($editing)
        <template x-if="balance_after_payment >= (-1*limit)">
        <a href="{{ route('food-orders.show', $foodOrder) }}" class="btn btn-success float-right">
            <i class="fa fa-cart-shopping"></i>
            {{ $editing ? "Confirm Order" : 'Create Order'}}
        </a>
        </template>
        <template x-if="balance_after_payment < (-1*limit)">
            <a  class="btn btn-danger float-right">
                Excedd Credit Limit !
            </a>
        </template>
        @endif
    </div>

    <script>
        function init_() {
            return {
                members: @json($members??[]),
                food_entries : @json($foodentries?? 'null'),
                mobile: {{ $editing ? $foodOrder->mobile : 'null' }},
                menu_names: @json($foodOrder->menu_names??[]),
                menu_names_json: JSON.stringify(@json($foodOrder->menu_names??[])),
                vat_rate: {{ $editing ? $foodOrder->vat_rate : 5 }},
                discount_rate: {{ $editing ? $foodOrder->discount_rate : 0 }},
                special_discount_rate: {{ $editing ? $foodOrder->special_discount_rate : 0 }},

                selected_member_id: {{ $editing ? $foodOrder->member_id : 'null' }},
                selected_food_entry_id: null,
                selected_food_quantity: null,
                selected_food_rate: null,
                selected_food_total_price: null,

                grand_price: {{ $editing ? $foodOrder->price : 'null' }},
                grand_discounted_price: {{ $editing ? $foodOrder->discounted_price : 'null' }},
                grand_discount: {{ $editing ? $foodOrder->discount+ $foodOrder->special_discount : 'null' }},
                grand_vat: {{ $editing ? $foodOrder->vat: 'null' }},
                grand_total: {{ $editing ? $foodOrder->payable_amount: 'null' }},

                balance: {{ $editing ? $member->balance: 'null' }},
                limit: {{ $editing ? $member->limit: 'null' }},
                balance_after_payment : {{ $editing ? $member->balance - $foodOrder->payable_amount : 'null' }},

                selectMemberItem(item_id) {
                    let member_item = this.members.filter(function(item){
                        return item.id == item_id;
                    })[0];
                    if(member_item) {
                        this.discount_rate = member_item.discount_rate;
                        this.mobile = member_item.phone;
                        this.balance = member_item.balance;
                        this.limit = member_item.limit;
                    }
                    else {
                        this.discount_rate = null;
                        this.mobile = null;
                    }
                    this.menu_names = [];
                },

                selectFoodItem(item_id) {
                    this.calculateItemPrice(item_id);
                },
                inputQuantity() {
                    if(this.selected_food_quantity < 1) {
                        this.selected_food_quantity = null;
                        return;
                    }
                    this.calculateItemPrice(this.selected_food_entry_id);
                },
                inputAdditionalDiscount() {
                    if(this.special_discount_rate < 0) {
                        this.special_discount_rate = null;
                        return;
                    }
                    this.calculateGrandPrice();
                },
                inputVat() {
                    if(this.vat_rate < 0) {
                        this.vat_rate = null;
                        return;
                    }
                    this.calculateGrandPrice();
                },
                addMenuName() {
                    if(this.selected_food_entry_id!= null && this.selected_food_quantity != null) {
                        this.menu_names.push({
                            "id": this.selected_food_entry_id,
                            "f": $("select[name=selected_food_entry_id] option:selected").text(),
                            "q": this.selected_food_quantity,
                            "r": this.selected_food_rate,
                            "p": this.selected_food_total_price,
                        });
                        this.menu_names_json = JSON.stringify(this.menu_names);
                        this.selected_food_entry_id = null;
                        this.selected_food_quantity = null;
                        this.selected_food_rate = null;
                        this.selected_food_total_price = null;

                        this.calculateGrandPrice();
                    }
                },
                removeMenuName(index) {
                    this.menu_names.splice(index, 1);
                    this.menu_names_json = JSON.stringify(this.menu_names);

                    this.calculateGrandPrice();
                },
                calculateItemPrice(food_entry_id) {
                    let food_item = this.food_entries.filter(function(item){
                        return item.id == food_entry_id;
                    })[0];

                    if(food_item && this.selected_food_quantity) {
                        this.selected_food_rate = food_item.price;
                        this.selected_food_total_price = this.selected_food_rate * this.selected_food_quantity;
                    } else {
                        this.selected_food_rate = null;
                        this.selected_food_total_price = null;
                    }
                },
                calculateGrandPrice() {
                    let grandPrice = 0;
                    this.menu_names.forEach(function(item){
                        grandPrice += item.p;
                    });
                    if(this.special_discount_rate) {
                        this.grand_discount = grandPrice * (this.discount_rate+this.special_discount_rate)/100;
                    } else {
                        this.grand_discount = grandPrice * this.discount_rate/100;
                    }
                    this.grand_price  = grandPrice;
                    this.grand_discounted_price = grandPrice -  this.grand_discount;
                    this.grand_vat = (grandPrice - this.grand_discount) * this.vat_rate/100;
                    this.grand_total = this.grand_discounted_price + this.grand_vat;
                    this.balance_after_payment = this.balance - this.grand_total;
                },
            };
        }

    </script>
</div>
