<?php
namespace App\Services\Parsers;

use App\Models\Category;
use App\Models\Source;
use App\Services\CategoryMapper;

class NewsAPIParser implements ArticleParserInterface
{
    private $category_id;
    public function __construct(string $category)
    {   
        $CategoryModel = Category::findByName( CategoryMapper::mapCategories($category));
        $this->category_id =($CategoryModel)? $CategoryModel->id:null;
    }
    
    public function parse(array $data): array
    {
        return [
            'source_id' => Source::findByName('newsapi')->id,
            'title' => $data['title'],
            'author' => $data['author'] ?? 'Unknown',
            'description' => $data['description'] ?? '',
            'url' => $data['url'],
            'image_url' => $data['urlToImage'] ?? '',
            'published_at' => date('Y-m-d H:i:s', strtotime($data['publishedAt'])),
            'source' => $data['source']['name'] ?? 'NewsAPI',
            'category_id' => $this->category_id,
        ];
    }
}