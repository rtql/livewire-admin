<?php

namespace App\Http\Livewire\Front\Pages\Info;

use App\Models\Certificate;
use App\Models\Document;
use App\Models\Page;
use Livewire\Component;

class InfoComponent extends Component
{
    public function render()
    {
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $page = Page::whereActive(true)->whereRoute('info')->first();
        $documents = Document::whereActive(true)->orderBy('ordering','asc')->get();
        $certificates= Certificate::whereType('certificate')->whereActive(true)->orderBy('ordering','asc')->get();
        $licences= Certificate::whereType('licence')->whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.pages.info.info-component', compact('og','page','documents','licences','certificates'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
