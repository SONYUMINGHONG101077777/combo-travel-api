<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'type',
        'img',
        'text',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
        ];
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}