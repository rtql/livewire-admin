<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class _Contact extends Model
{
    use HasFactory,
        HasTranslations;
    protected $table = 'contacts';
    protected $fillable = [
        'phone',
        'phone_res',
        'whatsup',
        'email',
        'address',
        'map',
        'created_at',
        'updated_at',
        'active' ,
        'ordering',
        'deleted_at',
        'facebook',
        'instagram',
        'linkedin',
        'pinterest',
        'youtube',
    ];
    public $translatable = [
        'address',
    ];
    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
