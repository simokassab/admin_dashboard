<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use App\Models\ProjectSource;
use App\Models\Tracking;
use Livewire\Component;

class Details extends Component
{
    public ProjectSource $project;
    public $trackingData, $visits, $first_clicks, $second_clicks, $successes, $failures, $second_visit;

    public function mount(ProjectSource $project)
    {
        $this->project = $project;
        $this->trackingData = Tracking::where('project_source_id', $project->id)->get();
        $this->visits = $this->trackingData->count();
        $this->second_visit = $this->trackingData->where('second_page_visit', '1')->count();
        $this->first_clicks = $this->trackingData->where('first_click', '1')->count();
        $this->second_clicks = $this->trackingData->where('second_click', '1')->count();
        $this->successes = $this->trackingData->where('success', '1')->count();
        $this->failures = $this->trackingData->where('failure', '1')->count();
    }

    public function render()
    {
        return view('livewire.projects.details')->layout('layouts.app');
    }
}
