<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Img extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_name',
        'animal_id',
        'file_name',
        'animal_id',
    ];

    public function animal(): BelongsTo
    {
        return	$this->belongsTo(Animal::class);
    }

}
