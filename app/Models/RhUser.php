<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RhUser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'group_id',
        'user_id',
        'role_id',
        'brand_id',
        'unit_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'rh_users';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function fav_campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'fav_campaign_rh_user');
    }
}
