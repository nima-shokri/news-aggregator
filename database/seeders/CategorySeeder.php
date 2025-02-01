<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Business',
                'mappings' => ['business', 'Business'],
            ],
            [
                'name' => 'Entertainment',
                'mappings' => ['entertainment', 'Arts', 'culture'],
            ],
            [
                'name' => 'General',
                'mappings' => ['general', 'news'],
            ],
            [
                'name' => 'Health',
                'mappings' => ['health', 'Health', 'society'],
            ],
            [
                'name' => 'Science',
                'mappings' => ['science', 'Science'],
            ],
            [
                'name' => 'Sports',
                'mappings' => ['sports', 'Sports', 'sport'],
            ],
            [
                'name' => 'Technology',
                'mappings' => ['technology', 'Technology'],
            ],
            [
                'name' => 'World',
                'mappings' => ['World', 'world', 'international'],
            ],
            [
                'name' => 'US',
                'mappings' => ['U.S.', 'us-news'],
            ],
            [
                'name' => 'Politics',
                'mappings' => ['Politics', 'politics'],
            ],
            [
                'name' => 'Opinion',
                'mappings' => ['Opinion', 'commentisfree'],
            ],
            [
                'name' => 'Education',
                'mappings' => ['Education'],
            ],
            [
                'name' => 'Food',
                'mappings' => ['Food', 'food'],
            ],
            [
                'name' => 'Environment',
                'mappings' => ['Climate', 'environment'],
            ],
            [
                'name' => 'Fashion',
                'mappings' => ['Style', 'fashion'],
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], ['mappings' => json_encode($category['mappings'])]);
        }
    }
}
