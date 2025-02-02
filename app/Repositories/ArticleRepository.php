<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    
    public function save(array $articleData)
    {
        return Article::updateOrCreate(
            ['url' => $articleData['url']],
            $articleData
        );
    }

    public function search(array $filters,array $relations = [], int $perPage = 10)
    {
        $query = Article::query();

        if (isset($filters['source_name'])) {
            $query->whereHas('newsSource', function ($query) use ($filters) {
                $query->whereRaw("LOWER(name) like '%" . strtolower($filters['source_name']) . "%'");
            });
        }
        if (isset($filters['category_name'])) {
            $query->whereHas('category', function ($query) use ($filters) {
                $query->whereRaw("LOWER(name) like '%" . strtolower($filters['category_name']) . "%'");
            });
        }

        if (isset($filters["q"])) {
            $query->where(function ($query) use ($filters) {
                $query->whereRaw("LOWER(title) like '%" . strtolower($filters['q']) . "%'")
                    ->orWhereRaw("LOWER(content) like '%" . strtolower($filters['q']) . "%'")
                    ->orWhereRaw("LOWER(description) like '%" . strtolower($filters['q']) . "%'");
            });
        }

        if (isset($filters["publisher"])) {
            $query->whereRaw("LOWER(source) like '%" . strtolower($filters['publisher']) . "%'");
        }

        if (isset($filters["from_date"])) {
            $query->where('published_at', '>=', $filters['from_date']);
        }

        if (isset($filters["to_date"])) {

            $query->where('published_at', '<=', $filters['to_date']);
        }
        if (isset($filters["author"])) {
            $query->whereRaw("LOWER(author) like '%" . strtolower($filters['author']) . "%'");
        }

        return $query->with($relations)->paginate($perPage);
    }
}
