<?php

use Laravel\Sanctum\Contracts\HasApiTokens;

return [
    /*
    * The sources array contains the configuration for each news source.
    */

    'sources' => [
        'newsapi' => [
            'url' => 'https://newsapi.org/v2/top-headlines',
            'params' => [
                'country' => 'us',
                'apiKey' =>  env('NEWSAPI_API_KEY', null),
                'category' => null,
            ],
            'categories' => [
                'business',
                'entertainment',
                'general',
                'health',
                'science',
                'sports',
                'technology',
            ],
            'result' => 'articles'

        ],
       
        'guardian' => [
            'url' => 'https://content.guardianapis.com/search',
            'params' => [
                'q' => null,
                'api-key' =>  env('GUARDIAN_API_KEY', null),
            ],
            'categories' => [
                'business',
                'culture',
                'news',
                'society',
                'science',
                'sport',
                'technology',
                'world',
                'us-news',
                'politics',
                'commentisfree',
                'food',
                'environment',
                'fashion',
            ],
            'result' => 'results'
        ],
        'nytimes' => [
            'url' => 'https://api.nytimes.com/svc/topstories/v2/technology.json',
            'params' => [
                'api-key' =>  env('NY_TIMES_API_KEY', null),
            ],
            'result' => 'results',
            'categories' => [
                'Business',
                'Arts',
                'Health',
                'Science',
                'Sports',
                'Technology',
                'World',
                'U.S.',
                'Politics',
                'Opinion',
                'Education',
                'Food',
                'Climate',
                'Style',
            ]
        ],
    ],


];
