<?php

namespace App\Http\Livewire\Admin\Sections\Hero;

use App\Models\Hero;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $title;
    public $file;
    public $newimage;
    public $active;
    public $ordering;
    public $slide_id;

    public function mount($id)
    {
        // $this->authorizeRoleOrPermission('slide-edit');

        $slide = Hero::where('id',$id)->first();
        $this->title = $slide->getTranslations('title');
        $this->file = $slide->file;
        $this->active = $slide->active;
        $this->slide_id = $slide->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png,webp',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png,webp',
        ]);
        $slide = Hero::find($this->slide_id);
        $slide->title = $this->title;
        if($this->newimage)
        {
            $title  = time(). '.png';
            $destinationPath = public_path('files/hero');
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('png');
            $img->fit(85,85)->save($destinationPath.'/'.$title);
            $slide->file = $title;
        }
        $slide->save();
        $this->alert('success', 'Card been changed successfully');
        return redirect()->route('admin.hero.items');
    }
    public function render()
    {
        $item = Hero::where('id',$this->slide_id)->first();
        return view('livewire.admin.sections.hero.edit', compact('item'))->extends('layouts.admin');
    }
}
