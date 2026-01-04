<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property int $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
    ];

    /**
     * Get all FAQs in this category
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class)->orderBy('order');
    }
}
