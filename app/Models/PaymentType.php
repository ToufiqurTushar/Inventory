<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'commission_rate'];

    protected $searchableFields = ['*'];

    protected $table = 'payment_types';
}
