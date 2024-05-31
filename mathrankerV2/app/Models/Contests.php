<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
    use HasFactory;
    protected $table = 'contests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
    ];
}
