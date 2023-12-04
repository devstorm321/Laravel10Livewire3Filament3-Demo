<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'place', 'brand_id'];

    protected $searchableFields = ['*'];

    public function careerSites()
    {
        return $this->hasMany(CareerSite::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function rhUsers()
    {
        return $this->hasMany(RhUser::class);
    }
}
