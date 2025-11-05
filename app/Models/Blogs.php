<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs'; // Table ka naam agar aapne SQL mein singular rakha hai

    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
