<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $table = 'problems';
    protected $primaryKey = 'p_id';

    protected $fillable = [
        'title',
        'max_xp',
        'uname',
        'created_at',
        'description',
        'answer',
    ];
}
