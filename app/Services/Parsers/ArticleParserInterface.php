<?php
namespace App\Services\Parsers;

interface ArticleParserInterface
{
    public function parse(array $data): array;
}