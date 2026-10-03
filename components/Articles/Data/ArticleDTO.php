<?php

namespace Italofantone\Articles\Data;

readonly class ArticleDTO
{
    public function __construct(
        public string $title,
        public string $content
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            content: $data['content'],
        );
    }
}
