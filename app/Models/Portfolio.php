<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio'; // table ka naam

    protected $fillable = [
        'name',
        'image',
        'title',
        'year',
        'files',
        'sub_heading',
    ];
}
