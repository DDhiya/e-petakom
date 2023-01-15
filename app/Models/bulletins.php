<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bulletins extends Model
{
    use HasFactory;

    public $table = 'bulletins';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'bulletinID', 'bulletinImage', 'title', 'description',
    ];
    protected $primaryKey = 'bulletinID';
}
