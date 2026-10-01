<?php

namespace Italofantone\Articles\Data;

readonly class ArticleDTO
{
    public function __construct(
        public string $title,
        public string $content
    ) {}
}