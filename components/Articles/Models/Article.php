<?php

namespace Italofantone\Articles\Models;

use Illuminate\Database\Eloquent\Model;
use Italofantone\Articles\Enums\ArticleStatus;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'published_at',
    ];

    protected $casts = [
        'status' => ArticleStatus::class,
        'published_at' => 'datetime',
    ];
}
