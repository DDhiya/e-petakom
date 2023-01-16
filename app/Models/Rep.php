<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rep extends Model
{
    use HasFactory;
    protected $table = 'rep';
    protected $primarykey ='id';
    protected $fillable = ['Author', 'Title', 'File','Report'];
}
