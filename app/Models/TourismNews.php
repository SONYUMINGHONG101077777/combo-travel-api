<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourismNews extends Model
{
    protected $table = 'tourism_news';

    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
        'order',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute(): string
    {
        return str_starts_with($this->image, 'http')
            ? $this->image
            : asset('storage/' . $this->image);
    }
}