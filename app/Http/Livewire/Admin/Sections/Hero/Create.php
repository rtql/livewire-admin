<?php

namespace App\Http\Livewire\Admin\Sections\Hero;

use App\Models\Hero;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AuthorizesRoleOrPermission;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $slides, $slide_id, $file, $title, $active, $ordering;

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
            'file' => 'image|mimes:jpeg,png,webp',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'file' => 'required|file|mimes:jpeg,png,webp',
            ]
        );
        $slide = new Hero();
        $slide->title = $this->title;
        if($this->file)
        {
            $title  = time(). '.png';
            $destinationPath = public_path('files/hero');
            $img   = \Intervention\Image\Facades\Image::make($this->file)->encode('png');
            $img->fit(85,85)->save($destinationPath.'/'.$title);
            $slide->file = $title;
        }
        $slide->save();
        $this->alert('success', 'Card has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('admin.hero.items');

    }
    public function render()
    {
        return view('livewire.admin.sections.hero.create')->extends('layouts.admin');
    }
}
