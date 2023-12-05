<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobDocument extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['campaign_id', 'name', 'type', 'path', 'label'];

    protected $searchableFields = ['*'];

    protected $table = 'job_documents';

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
