<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockIn extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_name',
        'created_by_id',
        'Product_type',
        'expiry_days',
        'initial_stock',
        'alerm_stock',
        'm_by_u',
        'product_image',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'stocks_in';
}
