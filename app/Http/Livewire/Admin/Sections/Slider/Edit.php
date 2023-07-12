<?php

namespace App\Http\Livewire\Admin\Sections\Slider;

use App\Models\Slider;
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

        $slide = Slider::where('id',$id)->first();
        $this->title = $slide->getTranslations('title');
        $this->file = $slide->file;
        $this->active = $slide->active;
        $this->slide_id = $slide->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'newimage' => 'nullable|mimes:jpg,png,svg,webp',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'nullable',
            'newimage' => 'nullable|mimes:jpg,png,svg,webp',
        ]);
        $slide = Slider::find($this->slide_id);
        $slide->title = $this->title;
        if($this->newimage)
        {
            $title  = time(). '.webp';
            $destinationPath = public_path('/files/slider');
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('webp', 90);
            $img->fit(1920,900)->save($destinationPath.'/'.$title);
            $slide->file = $title;
        }
        $slide->save();
        $this->alert('success', 'Slide has been changed successfully');
        return redirect()->route('admin.slider.items');
    }
    public function render()
    {
        $item = Slider::where('id',$this->slide_id)->first();

        return view('livewire.admin.sections.slider.edit', compact('item'))->extends('layouts.admin');
    }
}
