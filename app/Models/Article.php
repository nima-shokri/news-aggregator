<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_id','category_id','title', 'author', 'description', 'url', 'image_url', 'published_at', 'source'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
