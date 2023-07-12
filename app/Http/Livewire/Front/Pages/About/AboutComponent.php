<?php

namespace App\Http\Livewire\Front\Pages\About;

use App\Models\Media;
use App\Models\Page;
use App\Models\Section;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        $page = Page::whereActive(true)->whereRoute('about')->first();
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $photos = Media::whereType('photo')->whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.pages.about.about-component', compact('og','page', 'photos'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
