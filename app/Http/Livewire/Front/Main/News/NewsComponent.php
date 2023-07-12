<?php

namespace App\Http\Livewire\Front\Main\News;

use App\Models\Blog;
use App\Models\News;
use App\Models\Section;
use Livewire\Component;

class NewsComponent extends Component
{
    public function render()
    {
        $section = Section::whereActive(true)->whereOriginTitle('News')->first();
        $news = Blog::whereActive(true)->whereHomepage(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.main.news.news-component', compact('section', 'news'));
    }
}
