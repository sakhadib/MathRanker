<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestParticipate extends Model
{
    use HasFactory;
    protected $table = 'contest_participates';
    protected $primaryKey = 'id';
}
