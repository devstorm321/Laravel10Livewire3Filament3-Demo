<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'observations',
        'linked_in',
        'opt_in_contact',
        'title',
        'note',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'opt_in_contact' => 'boolean',
    ];

    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function introductions()
    {
        return $this->hasMany(Introduction::class);
    }
}
