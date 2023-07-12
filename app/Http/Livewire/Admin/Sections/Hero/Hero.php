<?php

namespace App\Http\Livewire\Admin\Sections\Hero;

use App\Models\Section;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Hero extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $title;
    public $description;
    public $file;
    public $newimage;
    public $active;
    public $ordering;
    public $slide_id;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $section = Section::whereRoute('hero')->first();
        $this->title = $section->getTranslations('title');
        $this->description = $section->getTranslations('description');
        $this->file = $section->file;
        $this->active = $section->active;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png,webp',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png,webp',
        ]);
        $section = Section::whereRoute('hero')->first();
        $section->title = $this->title;
        $section->description = $this->description;
        if($this->newimage)
        {
            $title  = time(). '.webp';
            $destinationPath = public_path('files/sections');
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('webp', 90);
            $img->fit(520,620)->save($destinationPath.'/'.$title);
            $section->file = $title;
        }
        $section->save();
        $this->alert('success', 'Section has been changed successfully');
        return redirect()->route('admin.landing.items');
    }
    public function render()
    {
        $section = Section::whereRoute('hero')->first();
        return view('livewire.admin.sections.hero.hero', compact('section'))->extends('layouts.admin');
    }
}
