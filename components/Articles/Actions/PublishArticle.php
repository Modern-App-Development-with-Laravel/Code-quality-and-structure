<?php

namespace Italofantone\Articles\Actions;

use Italofantone\Articles\Enums\ArticleStatus;
use Italofantone\Articles\Models\Article;

class PublishArticle
{
    public function execute(Article $article): void
    {
        $article->update([
            'status' => ArticleStatus::PUBLISHED,
            'published_at' => now(),
        ]);
    }
}
