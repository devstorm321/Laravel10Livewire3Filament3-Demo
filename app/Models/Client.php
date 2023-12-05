<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'video_url',
        'Ai_token',
        'subscription_type',
        'place',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'subscription_type' => 'array',
        'place' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function user2()
    {
        return $this->hasOne(Unit::class, 'client_id');
    }
}
