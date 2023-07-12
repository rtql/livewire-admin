<?php

namespace App\Models;

class _Section extends _ExtendedModel
{
    protected $table = 'sections';
    public static $filePath = '/sections';
    protected $fillable = [
        'parent_id',
        'route',
        'origin_title',
        'link',
        'tag',
        'title',
        'parent_id',
        'subtitle',
        'description',
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
