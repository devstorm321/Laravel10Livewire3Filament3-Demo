<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyDoc extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['entity_id'];

    protected $searchableFields = ['*'];

    protected $table = 'company_docs';

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
