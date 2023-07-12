<?php

namespace App\Http\Livewire\Admin\Sections\Transport;

use App\Models\Transport;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $title;
    public $description;
    public $active;
    public $ordering;
    public $slide_id;

    public function mount($id)
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $slide = Transport::where('id',$id)->first();
        $this->title = $slide->getTranslations('title');
        $this->description = $slide->getTranslations('description');
        $this->active = $slide->active;
        $this->slide_id = $slide->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'description' => 'nullable',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'nullable',
            'description' => 'nullable',
        ]);
        $slide = Transport::find($this->slide_id);
        $slide->title = $this->title;
        $slide->description = $this->description;
        $slide->save();
        $this->alert('success', 'Card has been changed successfully');
        return redirect()->route('admin.sections.transport');
    }
    public function render()
    {
        $item = Transport::where('id',$this->slide_id)->first();
        return view('livewire.admin.sections.transport.edit', compact('item'))->extends('layouts.admin');
    }
}
