<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'balance',
        'created_by_id',
    ];

    protected $searchableFields = ['*'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
