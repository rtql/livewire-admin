<?php

namespace App\Http\Livewire\Admin\Sections\News;

use App\Models\Blog;
use App\Models\News;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AuthorizesRoleOrPermission;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $slides, $slide_id, $file, $description, $title, $active, $ordering;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-create');
    }


    private function resetInputFields()
    {
        $this->title = '';
        $this->file = '';
        $this->description = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'description' => 'nullable',
            'file' => 'image|mimes:jpeg,png,webp',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'description' => 'nullable',
                'file' => 'required|file|mimes:jpeg,png,webp',
            ]
        );
        $slide = new Blog();
        $slide->title = $this->title;
        $slide->description = $this->description;
        if($this->file)
        {
            $title  = time(). '.webp';
            $destinationPath = public_path('files/blog');
            $img   = \Intervention\Image\Facades\Image::make($this->file)->encode('webp', 90);
            $img->fit(680,520)->save($destinationPath.'/'.$title);
            $slide->file = $title;
        }
        $slide->save();
        $this->alert('success', 'Card has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('admin.sections.news');

    }
    public function render()
    {
        return view('livewire.admin.sections.news.create')->extends('layouts.admin');
    }
}
