<?php

namespace Italofantone\Articles\Actions;

use Illuminate\Support\Str;
use Italofantone\Articles\Data\ArticleDTO;
use Italofantone\Articles\Models\Article;

class UpdateArticle
{
    public function execute(Article $article, ArticleDTO $data): void
    {
        $article->update([
            'title' => $data->title,
            'slug' => Str::slug($data->title),
            'content' => $data->content,
        ]);
    }
}
