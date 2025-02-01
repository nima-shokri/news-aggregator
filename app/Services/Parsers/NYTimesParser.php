<?php
namespace App\Services\Parsers;

use App\Models\Category;
use App\Models\Source;

class NYTimesParser implements ArticleParserInterface
{
    public function parse(array $data): array
    {
        return [
            'source_id' => Source::findByName('nytimes')->id,
            'title' => $data['title'],
            'author' => $data['byline'] ?? 'Unknown',
            'description' => $data['abstract'],
            'url' => $data['url'],
            'image_url' => $data['multimedia'][0]['url'] ?? '',
            'published_at' => date('Y-m-d H:i:s', strtotime($data['published_date'])),
            'source' => 'New York Times',
            'category_id' => Category::whereJsonContains('mappings', $data['section'] )->first()->id,
        ];
    }
}
