<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cv extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['applicant_id', 'observations', 'title'];

    protected $searchableFields = ['*'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
