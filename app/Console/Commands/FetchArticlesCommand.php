<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ArticleService;


class FetchArticlesCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch articles from news sources';


    
    /**
     * Create a new command instance.
     *
     * @param ArticleService $articleService
     */
    public function __construct(protected readonly ArticleService $articleService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sources = config('news.sources');

        $this->info("Fetching news...");
        try {
            foreach ($sources as $source => $value) {
                foreach ($value['categories'] as $category) {
                    $this->info($source.' ----> '.$category);
                    $value['params']['category'] = $category;
                    $this->articleService->fetchAndStoreArticles($source, $category,$value['url'], $value['params']);
                }
            }

            $this->info("News articles fetched and stored successfully.");
        } catch (\Exception $e) {
            $this->error("Error fetching news: " . $e->getMessage());
        }
    }
}
