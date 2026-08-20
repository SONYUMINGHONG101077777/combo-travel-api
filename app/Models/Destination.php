<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'description1',
        'description2',
        'img',
        'img1',
        'img2',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function options()
    {
        return $this->hasMany(DestinationOption::class)->orderBy('order');
    }
}