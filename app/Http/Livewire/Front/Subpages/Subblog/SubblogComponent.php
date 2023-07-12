<?php

namespace App\Http\Livewire\Front\Subpages\Subblog;

use App\Models\Blog;
use App\Models\Media;
use Livewire\Component;
use App\Models\Page;

class SubblogComponent extends Component
{
    public $item_id;
    public function mount($url)
    {
        $this->item_id = $url;
    }
    public function render()
    {
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $page = Page::whereActive(true)->whereRoute('blog')->first();
        $item = Blog::whereUrl($this->item_id)->first();
        $photos = Media::whereParentId(null)->whereType('photo')->whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.subpages.subblog.subblog-component', compact('og', 'page', 'item', 'photos'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
