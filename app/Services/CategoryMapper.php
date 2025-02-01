<?php
namespace App\Services;

class CategoryMapper
{
    private static array $categoryMap = [
        'Business' => ['business', 'Business'],
        'Entertainment' => ['entertainment', 'Arts', 'culture'],
        'General' => ['general', 'news'],
        'Health' => ['health', 'Health', 'society'],
        'Science' => ['science', 'Science'],
        'Sports' => ['sports', 'Sports', 'sport'],
        'Technology' => ['technology', 'Technology'],
        'World' => ['World', 'world', 'international'],
        'US' => ['U.S.', 'us-news'],
        'Politics' => ['Politics', 'politics'],
        'Opinion' => ['Opinion', 'commentisfree'],
        'Education' => ['Education'],
        'Food' => ['Food', 'food'],
        'Environment' => ['Climate', 'environment'],
        'Fashion' => ['Style', 'fashion'],
    ];

    public static function mapCategories(string $sourceCategories): string
    {
        foreach (self::$categoryMap as $standardCategory => $aliases) {
            if (in_array($sourceCategories, $aliases)) {
                return $standardCategory;
            }
        }

        return 'General';
    }
}
