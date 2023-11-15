<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'campaign_id',
        'applicant_id',
        'cv_id',
        'date',
        'recording_url',
        'note',
        'status',
        'tags',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'datetime',
        'tags' => 'array',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }

    public function testResponses()
    {
        return $this->hasMany(TestResponse::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
