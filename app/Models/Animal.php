<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Animal extends Model
{
    use HasFactory;
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function img(): BelongsTo
    {
        return $this->belongsTo(Img::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    
    
}
