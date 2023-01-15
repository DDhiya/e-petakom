<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    public $table = 'elections';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillables = [
      'status', 'changetime'
    ];
}
