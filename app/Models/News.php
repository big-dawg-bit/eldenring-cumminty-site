<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property \Carbon\Carbon $publication_date
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'publication_date',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'publication_date' => 'date',
        ];
    }

    /**
     * Relationship: News belongs to a User (admin who created it)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}

