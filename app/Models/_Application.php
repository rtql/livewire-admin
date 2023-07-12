<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = [
        'user',
        'email',
        'phone',
        'message',
        'call_source',
        'seen',
        ];
    
    protected $casts = [
        'deleted_at' => 'datetime',
        ];

}
