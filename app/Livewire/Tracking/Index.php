<?php

namespace App\Livewire\Tracking;

use App\Models\IntegrationLog;
use App\Models\Project;
use App\Models\Tracking;
use Livewire\Component;

class Index extends Component
{
    public Tracking $tracking;
    public $tracking_id;
    public $logs, $project;
    public function mount(Tracking $tracking)
    {
        $this->tracking = $tracking;
        $this->tracking_id = $tracking->id;
        $this->logs = IntegrationLog::where('tracking_id', $tracking->id)->get();
        $this->project = Project::where('name', $tracking->source)->first();

    }
    public function render()
    {
        return view('livewire.tracking.index')->layout('layouts.app');
    }
}
