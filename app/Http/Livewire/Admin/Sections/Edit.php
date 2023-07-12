<?php

namespace App\Http\Livewire\Admin\Sections;

use App\Models\Info;
use App\Models\_Page;
use App\Models\Section;
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
    public $file;
    public $newimage;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $active;
    public $ordering;
    public $slide_id;
    public $has_documents;
    public $has_media;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $page = _Page::whereRoute('landing')->first();
        $this->title = $page->getTranslations('title');
        $this->description = $page->getTranslations('description');
        $this->file = $page->file;
        $this->seo_title = $page->getTranslations('seo_title');
        $this->seo_description = $page->getTranslations('seo_description');
        $this->seo_keywords = $page->getTranslations('seo_keywords');
        $this->active = $page->active;
        $this->has_documents = $page->documents_block;
        $this->has_media = $page->media_block;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png,webp',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png,webp',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
        $page = _Page::whereRoute('home')->first();
        $page->title = $this->title;
        $page->description = $this->description;
        $page->seo_title = $this->seo_title;
        $page->seo_description = $this->seo_description;
        $page->seo_keywords = $this->seo_keywords;
        $page->documents_block = $this->has_documents;
        $page->media_block = $this->has_media;
        if($this->newimage)
        {
            $title  = 'og.jpg';
            $destinationPath = public_path('files/pages');
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('jpg');
            $img->save($destinationPath.'/'.$title);
            $page->file = $title;
        }
        $page->save();
        $this->alert('success', 'Page has been changed successfully');
        return redirect()->route('admin.pages');
    }
    public function render()
    {
        $page = _Page::whereRoute('home')->first();
        return view('livewire.admin.sections.edit', compact('page'))->extends('layouts.admin');
    }
}
