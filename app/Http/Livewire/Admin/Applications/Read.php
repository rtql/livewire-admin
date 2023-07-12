<?php

namespace App\Http\Livewire\Admin\Applications;

use App\Models\_Application;
use Livewire\Component;

class Read extends Component
{
    public $item;
    
    public function mount($id)
    {// TODO deleted or commented
        // $this->authorizeRoleOrPermission('slide-edit');

        $this->item = _Application::where('id',$id)->first();;
        
    }
    public function render()
    {
        return view('livewire.admin.applications.read')->extends('layouts.admin');
    }
}
