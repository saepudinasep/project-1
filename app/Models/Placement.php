<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Placement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_branch',
        'id_kas',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'id_branch', 'id');
    }

    public function kas(): BelongsTo
    {
        return $this->belongsTo(Kas::class, 'id_kas', 'id');
    }
}
