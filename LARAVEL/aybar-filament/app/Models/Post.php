<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;        // añadimos esto
use Illuminate\Database\Eloquent\Relations\BelongsTo;         // añadimos esto

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the category that owns the Post
     *
     * @return BelongsTo<int, Category>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);   // cada post pertenece a una categoría (lado n relación 1:n)
    }

    /**
     * Get the user that owns the Post
     *
     * @return BelongsTo<int, User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);       // cada post pertenece a un usuario (lado n relación 1:n)
    }
}