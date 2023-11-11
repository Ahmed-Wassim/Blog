<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'body',
        'thumbnail',
        'active',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shortBody()
    {
        return Str::words($this->body, 19);
    }

    public function getFormattedDate()
    {
        return $this->published_at->diffForHumans();
    }

    public function getThumbnail()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }
        return asset('storage/' . $this->thumbnail);
    }
}
