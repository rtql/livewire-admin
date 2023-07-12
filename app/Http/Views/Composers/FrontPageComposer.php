<?php

namespace App\Http\Views\Composers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Room;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontPageComposer
{
    private $headerPages;
    private $footerPages;
    private $informationPages;
    private $seoTitle;
    private $seoDescription;
    private $seoKeywords;

    public function __construct()
    {
        $this->headerPages = Cache::remember('headerPages', 3500, function () {
            return Page::headerPages();
        });
        $this->footerPages = Cache::remember('footerPages', 3500, function () {
            return Page::footerPages();
        });
        $this->informationPages = Cache::remember('informationPages', 3500, function () {
            return Page::informationPages();
        });
        $this->seoTitle = Page::seoTitle()  ?? Blog::seoTitle() ?? Room::seoTitle() ?? null;
        $this->seoDescription = Page::seoDescription()  ?? Blog::seoDescription() ?? Room::seoDescription();
        $this->seoKeywords = Page::seoKeywords()  ?? Blog::seoKeywords();
    }

    public function compose(View $view)
    {
        $view->with([
                     'headerPages'=>$this->headerPages,
                     'footerPages'=>$this->footerPages,
                     'informationPages' => $this->informationPages,
                     'seoTitle' => $this->seoTitle,
                     'seoDescription' => $this->seoDescription,
                     'seoKeywords' => $this->seoKeywords

        ]);
    }
}
