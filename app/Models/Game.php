<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'price',
      'description',
      'long_description',
      'developer',
      'publisher',
      'image_cover_path',
      'trailer_video_path',
      'release_date',
      'contain_adult_content',
      'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
