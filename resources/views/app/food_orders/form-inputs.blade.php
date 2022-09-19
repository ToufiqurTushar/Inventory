@php $editing = isset($foodOrder) @endphp

<div class="row" x-data="init_()" x-init="$nextTick(() => { filteredMembers();})">

    <x-inputs.group class="col-sm-12">
        <label class="label" for="member_id">Member<span class="text-danger">*</span></label>
        <div class="input-group">
            <input x-model="search" class="form-control" placeholder="Find..." type="text"  autocomplete="off">
            <button x-show="search != null && search.length > 0" @click="search = ''" class="btn btn-outline-secondary" type="button"><i class="fa fa-times"></i></button>
        </div>
        <div class="">
            <div class="bg-light overflow-auto p-1" style="max-height:150px;">
                <template x-for="item in filteredMembers()" :key="item.id">
                    <div class="p-1">
                        <input x-model="selected_member_id" @change="selectMemberItem($event.target.value)" class="hand" type="radio" :value="item.id" :id="'member-radio'+item.id" name="member_id">
                        <label class="hand" :for="'member-radio'+item.id" x-text="item.name+' - '+item.membership_no"></label>
                        {{--<li x-html="highlightSearch(item.name)"></li>--}}
                    </div>
                </template>
            </div>
            <template x-if="filteredMembers().length == 0">
                <div class="p-1 bg-warning">No Member Found !</div>
            </template>
        </div>
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
    <hr>

    <template x-if="show_confirm_payment_btn">
        <div class="row">
            <x-inputs.group class="col-lg-3">
                <x-inputs.select x-model="payment_type_id" @change="selectPaymentTypeItem($event.target.value)" name="payment_type_id" label="Payment Type">
                    @php $selected = $editing ? $foodOrder->payment_type_id : '' @endphp
                    <option value="">Please select</option>
                    @foreach($paymentTypes as $item)
                        <option value="{{ $item->id }}" {{ $selected ==  $item->id ? 'selected' : '' }}>{{  $item->name }}</option>
                    @endforeach
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
    </template>

    <div class="mt-4">
        <a
            href="{{ route('food-orders.index') }}"
            class="btn btn-light"
        >
            <i class="fa fa-arrow-left text-primary"></i>
            @lang('crud.common.back')
        </a>

        <button type="submit" class="btn btn-primary float-right" x-bind:disabled="menu_names.length == 0 || show_select_payment_type_btn">
            <i class="fa fa-floppy-disk"></i>
            {{ $editing ? "Update Order" : 'Create Order'}}
        </button>

        @if($editing)
            <template x-if="show_select_payment_type_btn && !show_confirm_payment_btn">
                <button @click="show_confirm_payment_btn = true" type="button" class="btn btn-success float-right">
                    <i class="fa fa-credit-card"></i> Select Payment Type
                </button>
            </template>
            <template x-if="show_confirm_payment_btn">
                <button type="submit" class="btn btn-success float-right" x-bind:disabled="payment_type_id == null || payment_type_id == ''">
                    <input name="confirm_payment" type="hidden" :value="(payment_type_id == null || payment_type_id == '')?0:1">
                    <i class="fa fa-cart-shopping"></i> Confirm Payment
                </button>
            </template>
            <template x-if="payment_type_id == 2 && balance_after_payment < (-1*limit)">
                <a  class="btn btn-danger float-right">
                    Excedd Credit Limit !
                </a>
            </template>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-default" onclick="printableNewWindow('printableAreaKitchen')"><i class="fa fa-print mr5"></i> Print Kitchen Copy</a>
            </div>
            <div id="printableAreaKitchen" >
                <table width="100%" class="table table-bordered" style="font-size: 12px">
                    <tbody>
                    <tr>
                        <td width="50%">
                            <div> <strong>Invoice</strong> #{{ $foodOrder->invoice_no }}</div>
                            <div> <strong>Invoice Date:</strong> {{  date_format(date_create($foodOrder->invoice_date ?? now()), 'l, F jS, Y') }}
                        </td>
                        <td width="50%">
                            <div> <strong>Invoiced To</strong></div>
                            <div> {{ \App\Models\Member::find($foodOrder->member_id)->name ?? '' }}</div>
                            <div> {{ $foodOrder->mobile }}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                    <table width="100%" class="table table-bordered" style="font-size: 12px">
                        <thead>
                        <tr>
                            <th style="text-align: left;" width="50%">Description</th>
                            <th style="text-align: center;" width="10%" class="e">Qty</th>
                            <th style="text-align: center;" width="20%" class="">Rate</th>
                            <th style="text-align: center;" width="30%" class="">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($foodOrder->menu_names as $item)
                            <tr class="align-middle">
                                @php
                                    $food = \App\Models\FoodEntry::find($item['id']);
                                    if($food) {
                                        $foodName = $food->name;
                                        if($food->sub_name) $foodName = $food->name.' <br>-'.$food->sub_name.'';
                                    }
                                @endphp
                                <td style="padding: 2px !important; text-align: left">{!!  $foodName ?? '-' !!}</td>
                                <td style="padding: 2px !important; text-align: center" class="align-middle">{{ $item['q'] }}</td>
                                <td style="padding: 2px !important; text-align: center" class="align-middle">৳ {{ $item['r'] }}</td>
                                <td style="padding: 2px !important; text-align: center" class="align-middle">৳ {{ $item['p']}}</td>
                            </tr>
                        @endforeach
                        @if(count($foodOrder->menu_names) < 2)
                            @foreach(array_fill(0, 2-count($foodOrder->menu_names), 0) as $item)
                                <tr>
                                    <td style="padding: 2px !important;">&nbsp;</td>
                                    <td style="padding: 2px !important;"></td>
                                    <td style="padding: 2px !important;"></td>
                                    <td style="padding: 2px !important;"></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <script>
        function init_() {
            return {
                search: {{ $editing ? \App\Models\Member::find($foodOrder->member_id)->membership_no??'null' : 'null' }},
                members: @json($members??[]),
                filteredMembers() {
                    if(this.search == null) return this.members;
                    return this.members.filter(
                        item => item.name.toLowerCase().includes(this.search) || item.membership_no.includes(this.search)
                    );
                },
                highlightSearch(s) {
                    if (this.search === '') return s;

                    return s.replaceAll(
                        new RegExp(`(${this.search.toLowerCase()})`, 'ig'), '<strong class="bg-primary">$1</strong>'
                    )
                },
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

                payment_type_id: {{ $editing ? $foodOrder->payment_type_id??'null' : 'null' }},
                commision_rate: null,
                show_select_payment_type_btn: {{ $editing ? 'true' : 'false' }},
                show_confirm_payment_btn: false,

                grand_price: {{ $editing ? $foodOrder->price : 'null' }},
                grand_discounted_price: {{ $editing ? $foodOrder->discounted_price : 'null' }},
                grand_discount: {{ $editing ? $foodOrder->discount+ $foodOrder->special_discount : 'null' }},
                grand_vat: {{ $editing ? $foodOrder->vat: 'null' }},
                grand_total: {{ $editing ? $foodOrder->payable_amount: 'null' }},

                balance: {{ $editing ? $member->balance: 'null' }},
                limit: {{ $editing ? $member->limit: 'null' }},
                balance_after_payment : {{ $editing ? $member->balance : 'null' }},

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
                selectPaymentTypeItem(item_id) {
                    this.calculateAfterBalance();
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

                    this.payment_type_id = null;
                    this.show_select_payment_type_btn = false;
                    this.show_confirm_payment_btn = false;
                },
                calculateAfterBalance() {
                    if(this.payment_type_id == 2) this.balance_after_payment = this.balance - this.grand_total;
                    else this.balance_after_payment = this.balance;
                },
            };
        }

    </script>
</div>
