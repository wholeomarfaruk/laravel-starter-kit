<?php

namespace App\Livewire\Website\Projects;

use Livewire\Component;

class ProjectDetails extends Component
{
    public function render()
    {
        return view('livewire.website.projects.project-details')->layout('layouts.website.website');
    }
}
