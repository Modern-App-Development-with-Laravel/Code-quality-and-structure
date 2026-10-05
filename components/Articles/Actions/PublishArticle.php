<?php

namespace Italofantone\Articles\Actions;

use Italofantone\Articles\Models\Article;

class PublishArticle
{
    public function execute(Article $article): void
    {
        $article->update([
            'status' => 'published',
            'published_at' => now(),
        ]);
    }
}
