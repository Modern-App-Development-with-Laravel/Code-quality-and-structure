<?php

namespace Italofantone\Articles\Actions;

use Illuminate\Support\Str;
use Italofantone\Articles\Data\ArticleDTO;
use Italofantone\Articles\Models\Article;

class CreateArticle
{
    public function execute(ArticleDTO $data): void
    {
        Article::create([
            'title' => $data->title,
            'slug' => Str::slug($data->title),
            'content' => $data->content,
        ]);
    }
}
