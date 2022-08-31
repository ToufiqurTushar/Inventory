<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['customer_id', 'member_type_id', 'card_no'];

    protected $searchableFields = ['*'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function memberType()
    {
        return $this->belongsTo(MemberType::class);
    }
}
