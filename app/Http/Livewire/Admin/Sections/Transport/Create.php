<?php

namespace App\Http\Livewire\Admin\Sections\Transport;

use App\Models\Transport;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AuthorizesRoleOrPermission;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $slides, $slide_id, $file, $title, $description, $active, $ordering;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-create');
    }


    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'description' => 'nullable',
        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'description' => 'nullable',
            ]
        );
        $slide = new Transport();
        $slide->title = $this->title;
        $slide->description = $this->description;
        $slide->save();
        $this->alert('success', 'Card has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('admin.sections.transport');

    }
    public function render()
    {
        return view('livewire.admin.sections.transport.create')->extends('layouts.admin');
    }
}
