<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', //menunjukkan bahwa like tertentu diberikan oleh pengguna tertentu pada post tertentu
        'post_id'
    ];
}

