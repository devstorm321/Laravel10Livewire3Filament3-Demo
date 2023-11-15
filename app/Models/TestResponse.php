<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestResponse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['document', 'application_id', 'trimoji_data'];

    protected $searchableFields = ['*'];

    protected $table = 'test_responses';

    protected $casts = [
        'trimoji_data' => 'array',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
