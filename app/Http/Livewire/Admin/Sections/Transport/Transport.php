<?php

namespace App\Http\Livewire\Admin\Sections\Transport;

use App\Models\Section;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Transport extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $file;
    public $newimage;
    public $active;
    public $ordering;
    public $slide_id;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $section = Section::whereRoute('transport')->first();
        $this->file = $section->file;
        $this->active = $section->active;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'newimage' => 'nullable|mimes:jpeg,png,webp',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'newimage' => 'nullable|mimes:jpeg,png,webp',
        ]);
        $section = Section::whereRoute('transport')->first();
        if($this->newimage)
        {
            $title  = time(). '.webp';
            $destinationPath = public_path('files/sections');
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('webp', 90);
            $img->fit(1920,800)->save($destinationPath.'/'.$title);
            $section->file = $title;
        }
        $section->save();
        $this->alert('success', 'Section has been changed successfully');
        return redirect()->route('admin.landing.items');
    }
    public function render()
    {
        $section = Section::whereRoute('transport')->first();
        return view('livewire.admin.sections.transport.transport', compact('section'))->extends('layouts.admin');
    }
}
