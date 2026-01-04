<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'location',
        'image',
        'difficulty',
        'drops',
        'health',
        'order',
    ];

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
