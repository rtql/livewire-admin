<?php

namespace App\Http\Livewire\Front\Subpages\Subservices;

use App\Models\Document;
use App\Models\Media;
use App\Models\Service;
use Livewire\Component;
use App\Models\Page;

class SubservicesComponent extends Component
{
    public $item_id;
    public function mount($url)
    {
        $this->item_id = $url;
    }
    public function render()
    {
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $page = Page::whereActive(true)->whereRoute('services')->first();
        $documents = Document::whereParentId(null)->whereActive(true)->orderBy('ordering','asc')->get();
        $photos = Media::whereParentId(null)->whereType('photo')->whereActive(true)->orderBy('ordering','asc')->get();
        $item = Service::whereUrl($this->item_id)->first();
        return view('livewire.front.subpages.subservices.subservices-component', compact('og', 'page','documents','photos','item'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
