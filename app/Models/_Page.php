<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _Page extends _ExtendedModel
{
    protected $table = 'pages';
    public static $filePath = '/pages';
    protected $fillable = [
        'parent_id',
        'route',
        'origin_title',
        'type',
        'section',
        'link',
        'tag',
        'title',
        'subtitle',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'file',
        'button',
        'url',
        'created_at',
        'updated_at',
        'active' ,
        'ordering',
        'deleted_at',
    ];
}
