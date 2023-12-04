<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documents extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['group_id', 'brand_id'];

    protected $searchableFields = ['*'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
