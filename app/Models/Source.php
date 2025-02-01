<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public static function findByName(string $name): ?self
    {
        return self::where('name', $name)->first();
    }
}
