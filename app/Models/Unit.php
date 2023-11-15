<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'place'];

    protected $searchableFields = ['*'];

    public function entities()
    {
        return $this->hasMany(Entity::class, 'group_id');
    }

    public function careerSites()
    {
        return $this->hasMany(CareerSite::class);
    }
}
