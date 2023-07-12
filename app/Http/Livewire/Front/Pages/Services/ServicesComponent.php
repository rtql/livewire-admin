<?php

namespace App\Http\Livewire\Front\Pages\Services;

use App\Models\Media;
use App\Models\Service;
use App\Models\Page;
use Livewire\Component;

class ServicesComponent extends Component
{
    public function render()
    {
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $page = Page::whereActive(true)->whereRoute('services')->first();
        $services = Service::whereActive(true)->get();
        return view('livewire.front.pages.services.services-component', compact('og','page','services'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
