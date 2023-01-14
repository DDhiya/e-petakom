<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Name;

class ApprovedCandidate extends Model
{
    use HasFactory;

    public $table = 'approved_candidates';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillables = [
      'matricid', 'name', 'position', 'major', 'intake',
      'manifesto', 'profilepicture', 'votecount' => 0
    ];
}
