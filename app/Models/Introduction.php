<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Introduction extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['applicant_id', 'video_url', 'title', 'campaign_id'];

    protected $searchableFields = ['*'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
