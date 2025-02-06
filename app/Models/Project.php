<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'name',
        'uuid',
        'campaign_id',
        'description',
        'status',
    ];

    public function sources()
    {
        return $this->belongsToMany(Source::class, 'project_source')
            ->withPivot('campaign_id')
            ->withTimestamps();
    }

    public function trackings()
    {
        return $this->hasMany(Tracking::class, 'project_id', 'id');
    }

//    uuid should be generated after project is created
    public static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            $project->uuid = Str::uuid();
        });
    }
}
