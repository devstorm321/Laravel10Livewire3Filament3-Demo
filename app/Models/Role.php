<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['type'];

    protected $searchableFields = ['*'];

    public function hrManagers()
    {
        return $this->hasMany(HrManager::class);
    }
}
