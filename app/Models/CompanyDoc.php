<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyDoc extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['group_id'];

    protected $searchableFields = ['*'];

    protected $table = 'company_docs';

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
