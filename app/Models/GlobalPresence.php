<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalPresence extends Model
{
    use HasFactory;
    protected $table = 'global_presences';
    protected $guarded = [];
}
