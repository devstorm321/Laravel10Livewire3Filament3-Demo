<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'campaign_id',
        'applicant_id',
        'rh_user_id',
        'datetime',
        'visio_link',
        'phone_contact',
        'notes',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function rhUser()
    {
        return $this->belongsTo(RhUser::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}