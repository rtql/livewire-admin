<?php

namespace App\Http\Livewire\Admin\Sections\News;

use App\Models\Section;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class News extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $title;
    public $active;
    public $ordering;
    public $slide_id;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $section = Section::whereRoute('news')->first();
        $this->title = $section->getTranslations('title');
        $this->active = $section->active;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'nullable',
        ]);
        $section = Section::whereRoute('news')->first();
        $section->title = $this->title;
        $section->save();
        $this->alert('success', 'Card has been changed successfully');
        return redirect()->route('admin.landing.items');
    }
    public function render()
    {
        $section = Section::whereRoute('news')->first();
        return view('livewire.admin.sections.news.news', compact('section'))->extends('layouts.admin');
    }
}
