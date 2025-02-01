<?php
namespace App\Services\Parsers;

use App\Models\Category;
use App\Models\Source;
use App\Services\CategoryMapper;

class GuardianParser implements ArticleParserInterface
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
            'source_id' => Source::findByName('guardian')->id,
            'title' => $data['webTitle'],
            'author' => 'Unknown',
            'description' => '',
            'url' => $data['webUrl'],
            'image_url' => '',
            'published_at' => date('Y-m-d H:i:s', strtotime($data['webPublicationDate'])),
            'source' => 'The Guardian',
            'category_id' => $this->category_id,
        ];
    }
}
