<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public function book(): BelongsTo
    {
        return $this->BelongsTo(Book::class);
    }

    public function client(): BelongsTo
    {
        return $this->BelongsTo(Client::class);
    }
}
