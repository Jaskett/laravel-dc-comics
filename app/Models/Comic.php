<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'thumb', 'series', 'type', 'price', 'sale_date', 'description', 'slug'];

    public static function generateSlug($string) {
        $slug = Str::slug($string, '-');

        $original_slug = $slug;
        $c = 1;
        $comic_exists = Comic::where('slug', $slug)
        ->first();
        while($comic_exists){
            $slug = $original_slug . '-' . $c;
            $comic_exists = Comic::where('slug',$slug)
            ->first();
            $c++;
        }
        return $slug;
    }
}
