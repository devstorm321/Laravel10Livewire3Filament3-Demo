<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityDocuments extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'group_id',
        'brand_id',
        'unit_id',
        'name',
        'path',
        'type',
        'label',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'entity_documents';

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
