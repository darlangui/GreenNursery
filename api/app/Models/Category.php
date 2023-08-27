<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'desc'];

    public function plants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Plant::class);
    }
}
