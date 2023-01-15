<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prop extends Model
{
    use HasFactory;
    protected $table = 'prop';
    protected $primarykey ='id';
    protected $fillable = ['Author', 'MatricID', 'Title','File'];
}