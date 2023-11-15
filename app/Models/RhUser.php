<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RhUser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['entity_id', 'user_id', 'role_id'];

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

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function fav_campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'fav_campaign_rh_user');
    }
}
