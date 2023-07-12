<?php

namespace App\Http\Livewire\Front\Pages\Faq;

use App\Models\Faq;
use App\Models\Page;
use Livewire\Component;

class FaqComponent extends Component
{
    public function render()
    {
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $page = Page::whereActive(true)->whereRoute('faq')->first();
        $items = Faq::whereActive(true)->get();
        return view('livewire.front.pages.faq.faq-component', compact('og','page', 'items'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
