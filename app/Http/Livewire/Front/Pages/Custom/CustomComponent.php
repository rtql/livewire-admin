<?php

namespace App\Http\Livewire\Front\Pages\Custom;

use Livewire\Component;
use App\Models\Certificate;
use App\Models\Document;
use App\Models\Media;
use App\Models\Page;

class CustomComponent extends Component
{
    public $item_url;
    public function mount($url)
    {
        $this->item_url = $url;
    }
    public function render()
    {
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $page = Page::whereActive(true)->whereUrl($this->item_url)->first();
        $parent = Page::whereId($page->parent_page)->first();
        $subpages = Page::whereActive(true)->whereParentPage($page->id)->get();
        $photos = Media::whereParentId($page->id)->whereActive(true)->orderBy('ordering','asc')->get();
        $documents = Document::whereParentId($page->id)->whereActive(true)->orderBy('ordering', 'asc')->get();
        $certificates = Certificate::whereParentId($page->id)->whereType('certificate')->whereActive(true)->orderBy('ordering', 'asc')->get();
        $licences = Certificate::whereParentId($page->id)->whereType('licence')->whereActive(true)->orderBy('ordering', 'asc')->get();
        return view('livewire.front.pages.custom.custom-component', compact('og', 'parent', 'page', 'subpages', 'photos', 'documents', 'licences', 'certificates'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
