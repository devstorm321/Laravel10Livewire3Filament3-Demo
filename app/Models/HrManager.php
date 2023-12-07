<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HrManager extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['group_id', 'user_id', 'role_id'];

    protected $searchableFields = ['*'];

    protected $table = 'hr_managers';

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

    public function fav_campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'fav_campaign_hr_manager');
    }
}
