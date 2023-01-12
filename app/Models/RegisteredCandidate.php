<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredCandidate extends Model
{
    use HasFactory;

    public $table = 'registered_candidates';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillables = [
      'matricid', 'name', 'position', 'major', 'intake',
      'manifesto', 'profilepicture',
    ];
}
