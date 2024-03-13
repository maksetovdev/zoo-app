<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Region extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name'
    ];
    
    public $translatable = ['name'];
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
