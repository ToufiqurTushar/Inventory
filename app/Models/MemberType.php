<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'name_bn'];

    protected $searchableFields = ['*'];

    protected $table = 'member_types';

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
