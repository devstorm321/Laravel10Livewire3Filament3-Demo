<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function groups()
    {
        return $this->morphedByMany(Group::class, 'roleable');
    }

    public function brands()
    {
        return $this->morphedByMany(Brand::class, 'roleable');
    }

    public function units()
    {
        return $this->morphedByMany(Unit::class, 'model_has_role');
    }
}
