<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'video_interview_url',
        'description',
        'mail_contact',
        'requirement_list',
        'linked_in_version',
        'contracts_types',
        'entity_id',
        'public_show_entity',
        'travel_scope',
        'work_schedule',
        'start_date_expected',
        'show_salary_range',
        'salary_range',
        'work_location_coordinates',
        'show_on_linked_in',
        'show_on_indeed',
        'show_on_carreer_site',
        'private_tags',
        'public_tags',
        'manager_email_alerts',
        'managers',
        'survey',
        'trimoji_test',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'requirement_list' => 'array',
        'linked_in_version' => 'array',
        'contracts_types' => 'array',
        'public_show_entity' => 'boolean',
        'travel_scope' => 'array',
        'work_schedule' => 'array',
        'show_salary_range' => 'boolean',
        'show_on_linked_in' => 'boolean',
        'show_on_indeed' => 'boolean',
        'show_on_carreer_site' => 'boolean',
        'private_tags' => 'array',
        'public_tags' => 'array',
        'manager_email_alerts' => 'boolean',
        'managers' => 'array',
        'survey' => 'array',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function jobDocuments()
    {
        return $this->hasMany(JobDocument::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function introductions()
    {
        return $this->hasMany(Introduction::class);
    }

    public function hrManagers()
    {
        return $this->belongsToMany(HrManager::class, 'fav_campaign_hr_manager');
    }
}
