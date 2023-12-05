<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'unitable_id',
        'unitable_type',
        'client_id',
        'brand_id',
    ];

    protected $searchableFields = ['*'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function allEntityDocuments()
    {
        return $this->hasMany(EntityDocuments::class);
    }

    public function careerSites()
    {
        return $this->hasMany(CareerSite::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function roles()
    {
        return $this->morphToMany(Role::class, 'model_has_role');
    }
}
