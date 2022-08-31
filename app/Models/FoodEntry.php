<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodEntry extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_name',
        'image',
        'production_cost',
        'sale_cost',
        'member_discount',
        'special_discount',
        'others_discount',
        'created_by_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'food_entries';
}
