<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotion';

    protected $fillable = [
        'code',
        'percentage',
        'active',
        'expire_at',
    ];

    protected function casts(): array
    {
        return [
            'percentage' => 'integer',
            'active' => 'boolean',
            'expire_at' => 'datetime',
        ];
    }
}
