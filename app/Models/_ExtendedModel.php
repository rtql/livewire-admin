<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class _ExtendedModel extends Model
{
    use HasFactory,
        HasTranslations,
        SoftDeletes;

    protected $fillable = [
        'title',
        'parent_id',
        'subtitle',
        'description',
        'file',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'button',
        'url',
        'created_at',
        'updated_at',
        'active' ,
        'ordering',
        'deleted_at',
    ];

    public $translatable = [
        'title',
        'subtitle',
        'description',
        'button',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function getFile($file = null)
    {
        if ($file) {
            $fileName = $file;
        } else {
            if ($this->file) {
                $fileName = $this->file;
            } else {
                return '';
            }
        }

        $path = static::$filePath;

        return asset(sprintf('files%s/%s', $path, $fileName));
    }

    public function getOriginFile($file = null)
    {
        if ($file) {
            $fileName = $file;
        } else {
            if ($this->origin_file) {
                $fileName = $this->origin_file;
            } else {
                return '';
            }
        }

        $path = static::$filePath;

        return asset(sprintf('files%s/%s', $path, $fileName));
    }

}
