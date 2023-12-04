<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'group_id', 'place'];

    protected $searchableFields = ['*'];

    public function group()
    {
        return $this->belongsTo(Unit::class, 'group_id');
    }

    public function rhUsers()
    {
        return $this->hasMany(RhUser::class);
    }

    public function companyDocs()
    {
        return $this->hasMany(CompanyDoc::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function careerSites()
    {
        return $this->hasMany(CareerSite::class);
    }
}
