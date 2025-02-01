<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'mappings'];

    protected $casts = [
        'mappings' => 'array', // Automatically cast JSON field to an array
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public static function findByName(string $name): ?self
    {
        return self::where('name', $name)->first();
    }
}
