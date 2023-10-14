<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function author(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
