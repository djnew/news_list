<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsElement extends Model
{
    use HasFactory;

    protected $casts = [
        'active_from' => 'datetime',
    ];
}
