<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            [
                'name' => 'newsapi',
            ],
            [
                'name' => 'nytimes',
            ],
            [
                'name' => 'guardian',
            ],
            
        ];

        foreach ($sources as $source) {
            Source::updateOrCreate(['name' => $source['name']]);
        }
    }
}
