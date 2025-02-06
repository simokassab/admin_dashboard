<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Edit extends Component
{
    public Project $project;

    // Add separate properties for form fields
    public $name;
    public $campaign_id;
    public $description;
    public $status;

    public function mount(Project $project){
        $this->project = $project;
        // Initialize the form fields with project values
        $this->name = $project->name;
        $this->campaign_id = $project->campaign_id;
        $this->description = $project->description;
        $this->status = $project->status;
    }

    public function save()
    {
        $this->project->update([
            'name' => $this->name,
            'campaign_id' => $this->campaign_id,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        session()->flash('message', "Project {$this->project->name} updated successfully.");
//        redirect to dashboard
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.projects.edit')->layout('layouts.app');
    }
}
