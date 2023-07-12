<?php

namespace App\Http\Livewire\Front;

use App\Models\Page;
use App\Models\Section;
use Livewire\Component;

class _Home extends Component
{
    public function render()
    {
        
        // $page = Page::whereActive(true)->whereRoute('landing')->first();
        // $og = Page::whereActive(true)->whereRoute('landing')->first();
        // $sections = Section::whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front._home'
        // , compact('sections')
        )->extends('layouts.app'
        // , ['page' => $page, 'og' => $og]
    );
    }
}
