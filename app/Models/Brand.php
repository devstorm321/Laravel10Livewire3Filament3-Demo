<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Brand extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
