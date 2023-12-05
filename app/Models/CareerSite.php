<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerSite extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'is_active',
        'name',
        'url',
        'background_color',
        'buttons_color',
        'submit_button_label',
        'redirect_url',
        'company_video_presentation_url',
        'cover_pic_path',
        'post_apply_text',
        'brand_id',
        'group_id',
        'unit_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'career_sites';

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
