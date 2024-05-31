<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
    use HasFactory;
    protected $table = 'contests';
    protected $primaryKey = 'c_id';

    protected $fillable = [
        'c_id',
        'title',
        'description',
        'start_time',
        'end_time',
    ];
}
