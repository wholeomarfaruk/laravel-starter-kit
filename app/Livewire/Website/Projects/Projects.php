<?php

namespace App\Livewire\Website\Projects;

use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        return view('livewire.website.projects.projects')->layout('layouts.website.website');
    }
}
