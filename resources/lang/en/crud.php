<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'pdf'=> 'PDF',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'customers' => [
        'name' => 'Customers',
        'index_title' => 'Customers List',
        'new_title' => 'New Customer',
        'create_title' => 'Create Customer',
        'edit_title' => 'Edit Customer',
        'show_title' => 'Show Customer',
        'inputs' => [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'balance' => 'Balance',
            'created_by_id' => 'Created By Id',
        ],
    ],

    'food_entries' => [
        'name' => 'All Food',
        'index_title' => 'AllFood List',
        'new_title' => 'New Food',
        'create_title' => 'Create Food',
        'edit_title' => 'Edit Food',
        'show_title' => 'Show Food',
        'inputs' => [
            'name' => 'Name',
            'sub_name' => 'Sub Name',
            'name_bn' => 'Name Bn',
            'sub_name_bn' => 'Sub Name Bn',
            'image' => 'Image',
            'price' => 'Price',
            'discounted_price' => 'Discounted Price',
            'created_by_id' => 'Created By Id',
        ],
    ],

    'members' => [
        'name' => 'Members',
        'index_title' => 'Members List',
        'new_title' => 'New Member',
        'create_title' => 'Create Member',
        'edit_title' => 'Edit Member',
        'show_title' => 'Show Member',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'image' => 'Image',
            'membership_no' => 'Membership No',
            'membership_type_id' => 'Membership Type',
            'balance' => 'Balance',
            'limit' => 'Limit',
            'created_by_id' => 'Created By Id',
        ],
    ],

    'membership_types' => [
        'name' => 'Membership Types',
        'index_title' => 'MembershipTypes List',
        'new_title' => 'New Membership type',
        'create_title' => 'Create MembershipType',
        'edit_title' => 'Edit MembershipType',
        'show_title' => 'Show MembershipType',
        'inputs' => [
            'type' => 'Type',
            'type_bn' => 'Type Bn',
            'discount_rate' => 'Discount Rate',
            'created_by_id' => 'Created By Id',
        ],
    ],

    'stocks_in' => [
        'name' => 'Stocks In',
        'index_title' => 'StocksIn List',
        'new_title' => 'New Stock in',
        'create_title' => 'Create StockIn',
        'edit_title' => 'Edit StockIn',
        'show_title' => 'Show StockIn',
        'inputs' => [
            'product_name' => 'Product Name',
            'created_by_id' => 'Created By Id',
            'Product_type' => 'Product Type',
            'expiry_days' => 'Expiry Days',
            'initial_stock' => 'Initial Stock',
            'alerm_stock' => 'Alerm Stock',
            'm_by_u' => 'M By U',
            'product_image' => 'Product Image',
        ],
    ],

    'food_orders' => [
        'name' => 'Food Orders',
        'index_title' => 'FoodOrders List',
        'new_title' => 'New Food order',
        'create_title' => 'Create FoodOrder',
        'edit_title' => 'Edit FoodOrder',
        'show_title' => 'Show FoodOrder',
        'inputs' => [
            'quantity' => 'Quantity',
            'discount' => 'Discount',
            'price' => 'Price',
            'special_discount' => 'Special Discount',
            'discounted_price' => 'Discounted Price',
            'vat_rate' => 'Vat Rate',
            'vat' => 'Vat',
            'mobile' => 'Mobile',
            'menu_names' => 'Menu Names',
            'payable_amount' => 'Payable Amount',
            'payment_type' => 'Payment Type',
            'payment_status' => 'Payment Status',
            'net_sale_price' => 'Net Sale Price',
            'created_by_id' => 'Created By Id',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'payment_types' => [
        'name' => 'Payment Types',
        'index_title' => 'PaymentTypes List',
        'new_title' => 'New Payment type',
        'create_title' => 'Create PaymentType',
        'edit_title' => 'Edit PaymentType',
        'show_title' => 'Show PaymentType',
        'pdf' => 'PDF',
        'inputs' => [
            'name' => 'Name',
            'commission_rate' => 'Commission Rate',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
    'reports' => [
        'index_title' => 'Sales Report',
        'show' => 'Submit'
    ]
];
