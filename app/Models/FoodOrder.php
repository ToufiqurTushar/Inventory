<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodOrder extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quantity',
        'discount',
        'created_by_id',
        'member_id',
        'price',
        'mobile',
        'menu_names',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'food_orders';

    protected $casts = [
        'menu_names' => 'array',
    ];
}
