<?php

namespace App\Http\Livewire\Admin\Sections\Slider;

use App\Models\Slider;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AuthorizesRoleOrPermission;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $slides, 
        $slide_id,
        $file,
        $title,
        $active,
        $ordering;

    public function mount()
    {
        // $this->authorizeRoleOrPermission('slide-create');
    }


    private function resetInputFields()
    {
        $this->title = '';
        $this->file = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'file' => 'image|mimes:jpeg,png,svg,webp',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'file' => 'required|image|mimes:jpeg,png,svg,webp',
            ]
        );
        $slide = new Slider();
        $slide->title = $this->title;
        if($this->file)
        {
            $title  = time(). '.webp';
            $destinationPath = public_path('/files/slider');
            $img   = \Intervention\Image\Facades\Image::make($this->file)->encode('webp', 90);
            $img->fit(1920,900)->save($destinationPath.'/'.$title);
            $slide->file = $title;
        }
        $slide->save();
        $this->alert('success', 'Slide has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('admin.slider.items');

    }
    public function render()
    {
        return view('livewire.admin.sections.slider.create')->extends('layouts.admin');
    }
}
