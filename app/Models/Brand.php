<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['group_id', 'name'];

    protected $searchableFields = ['*'];

    public function careerSite()
    {
        return $this->hasOne(CareerSite::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function allDocuments()
    {
        return $this->hasMany(Documents::class);
    }

    public function rhUsers()
    {
        return $this->hasMany(RhUser::class);
    }
}
