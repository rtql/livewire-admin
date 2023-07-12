<?php

namespace App\Models\Traits\Relationships;


use App\Helpers\PageRouteService;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PageRelationships
{
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('model', 'page')->orderBy('ordering', 'asc');
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('ordering', 'asc');
    }

    public static function forBuyers()
    {
        return self::class::whereBuyers(true)->whereActive(true)->select('id','url','title')->orderBy('ordering','asc')->get();
    }

    public static function forInformation()
    {
        return self::class::whereAbout(true)->whereActive(true)->select('id','url','title')->orderBy('ordering','asc')->get();
    }

    public static function currentPage()
    {
        return self::class::where('url',request()->segment(count(request()->segments())))->first();
    }
    public static function seoTitle()
    {
        $page = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($page){
            return  ($page->seo_title == "" || $page->seo_title == null) ? $page->title : $page->seo_title;
        }
        return null;
    }
    public static function seoDescription()
    {
        $page = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($page){
            return $page->seo_description;
        }
        return null;
    }
    public static function seoKeywords()
    {
        $page = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($page){
            return $page->seo_keywords;
        }
        return null;
    }
    public static function headerPages()
    {
        return self::class::whereNull('parent_id')->whereActive(true)->whereToTop(true)->orderBy('ordering','asc')->get();
    }
    public static function footerPages()
    {
        return self::class::whereActive(true)->whereToFooter(true)->whereNot('static','home')->whereNot('static','informational')->whereInformation(false)->orderBy('ordering','asc')->get();
    }
    public static function informationPages()
    {
        return self::class::whereNull('parent_id')->whereActive(true)->whereToFooter(true)->whereInformation(true)->where(function ($q){
            $q->whereNot('static','home');
            $q->whereNot('static','informational');
            $q->orWhere('static',null);
        })->get();
    }


    public function getRouteAttribute()
    {
        $categoryRouteService = app(PageRouteService::class);

        return $categoryRouteService->getRoute($this);
    }


}
