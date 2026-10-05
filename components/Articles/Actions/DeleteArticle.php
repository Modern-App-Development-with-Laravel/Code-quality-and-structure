<?php

namespace Italofantone\Articles\Actions;

use Italofantone\Articles\Models\Article;

class DeleteArticle
{
    public function execute(Article $article): void
    {
        $article->delete();
    }
}
