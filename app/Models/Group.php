<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Group extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'video_url', 'ai_token', 'formula', 'subscription_type', 'place'];

    protected $searchableFields = ['*'];

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
