<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * @param  Builder<Item>  $query
     */
    public function scopeSearch(Builder $query, string $term): void
    {
        $query->where('name', 'like', $term.'%');
    }
}
