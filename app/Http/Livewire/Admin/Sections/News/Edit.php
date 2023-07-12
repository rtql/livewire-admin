<?php

namespace App\Http\Livewire\Admin\Sections\News;

use App\Models\Blog;
use App\Models\News;
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
    public $active;
    public $ordering;
    public $slide_id;

    public function mount($id)
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $slide = Blog::where('id',$id)->first();
        $this->title = $slide->getTranslations('title');
        $this->description = $slide->getTranslations('description');
        $this->file = $slide->file;
        $this->active = $slide->active;
        $this->slide_id = $slide->id;
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
        $slide = Blog::find($this->slide_id);
        $slide->title = $this->title;
        $slide->description = $this->description;
        if($this->newimage)
        {
            $title  = time(). '.webp';
            $destinationPath = public_path('files/blog');
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('webp', 90);
            $img->fit(680,520)->save($destinationPath.'/'.$title);
            $slide->file = $title;
        }
        $slide->save();
        $this->alert('success', 'Card been changed successfully');
        return redirect()->route('admin.sections.news');
    }
    public function render()
    {
        $item = Blog::where('id',$this->slide_id)->first();
        return view('livewire.admin.sections.news.edit', compact('item'))->extends('layouts.admin');
    }
}
