<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function placements(): HasMany
    {
        return $this->hasMany(Placement::class, 'id_kas', 'id');
    }
}
