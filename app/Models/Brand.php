<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand'; // Table ka naam agar aapne SQL mein singular rakha hai

    protected $fillable = [
        'name',
        'image',
    ];
}
