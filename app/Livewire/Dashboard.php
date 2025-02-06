<?php

namespace App\Livewire;

use App\Models\Tracking;
use Livewire\Component;


class Dashboard extends Component
{
    public $visits, $success, $failure, $count;
    public function mount()
    {
        $tracking = Tracking::query();

        $this->visits = $tracking->count();
        $this->success = Tracking::where('success', '1')->count();
        $this->failure = Tracking::where('failure', '1')->count();

    }
    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}

