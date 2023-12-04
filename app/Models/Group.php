<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'place'];

    protected $searchableFields = ['*'];

    public function rhUsers()
    {
        return $this->hasMany(RhUser::class);
    }

    public function careerSites()
    {
        return $this->hasMany(CareerSite::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function allDocuments()
    {
        return $this->hasMany(Documents::class);
    }
}
