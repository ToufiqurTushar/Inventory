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
        'menu_name',
        'quantity',
        'discount',
        'created_by_id',
        'price',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'food_orders';
}
