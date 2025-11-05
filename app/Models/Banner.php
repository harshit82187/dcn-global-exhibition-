<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner'; // Table ka naam agar aapne SQL mein singular rakha hai

    protected $fillable = [
        'title',
        'heading',
        'description',
        'image',
    ];
}
