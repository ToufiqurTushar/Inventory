<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
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
        'name' => 'Food Entries',
        'index_title' => 'FoodEntries List',
        'new_title' => 'New Food entry',
        'create_title' => 'Create FoodEntry',
        'edit_title' => 'Edit FoodEntry',
        'show_title' => 'Show FoodEntry',
        'inputs' => [
            'product_name' => 'Product Name',
            'image' => 'Image',
            'production_cost' => 'Production Cost',
            'sale_cost' => 'Sale Cost',
            'member_discount' => 'Member Discount',
            'special_discount' => 'Special Discount',
            'others_discount' => 'Others Discount',
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
            'customer_id' => 'Customer',
            'member_type_id' => 'Member Type',
            'card_no' => 'Card No',
        ],
    ],

    'member_types' => [
        'name' => 'Member Types',
        'index_title' => 'MemberTypes List',
        'new_title' => 'New Member type',
        'create_title' => 'Create MemberType',
        'edit_title' => 'Edit MemberType',
        'show_title' => 'Show MemberType',
        'inputs' => [
            'name' => 'Name',
            'name_bn' => 'Name Bn',
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
            'created_by_id' => 'Created By Id',
            'price' => 'Price',
            'mobile' => 'Mobile',
            'menu_names' => 'Menu Names',
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
];
