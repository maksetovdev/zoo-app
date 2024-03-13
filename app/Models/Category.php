<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'img_id',
    ];
    
    public function img(): BelongsTo
    {
        return $this->belongsTo(Img::class);
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
