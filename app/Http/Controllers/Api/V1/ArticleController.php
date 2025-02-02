<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexArticleRequest;
use App\Http\Resources\ArticleResources;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(protected ArticleRepository $articleRepository)
    {
    }

    public function index(IndexArticleRequest $request){
        
        
        $filters = $request->validated();
        $articles = $this->articleRepository->search($filters,[
            'newsSource',
            'category'
        ]);
        return ArticleResources::collection($articles);

    }
}
