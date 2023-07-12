<?php

namespace App\Http\Livewire\Front\Pages\Blog;

use App\Models\Blog;
use App\Models\Media;
use App\Models\Page;
use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {

        $page = Page::whereActive(true)->whereRoute('blog')->first();
        $items = Blog::whereActive(true)->get();
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        return view('livewire.front.pages.blog.blog-component', compact('og','page','items'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
