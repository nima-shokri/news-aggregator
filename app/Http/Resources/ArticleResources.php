<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'source' => $this->whenLoaded('newsSource', fn() => $this->newsSource->name),
            'category' => $this->whenLoaded('category', fn() => $this->category->name),
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'url' => $this->url,
            'image_url' => $this->image_url,
            'published_at' => $this->published_at,
            'publisher' => $this->source,
        ];
    }
}
