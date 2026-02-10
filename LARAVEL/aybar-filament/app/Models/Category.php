<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // añadimos esto
use Illuminate\Database\Eloquent\Relations\HasMany;     // añadimos esto

class Category extends Model
{
    use HasFactory;                                     // añadimos desde aquí ----

    protected $guarded = [];

    /**
     *  Get all of the posts for the Category
     *
     *  @return BelongsTo<int, Post>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);             // una categoría contendrá varios posts (relación 1:n, lado 1) 
    }                                                   // ------hasta aquí
}
