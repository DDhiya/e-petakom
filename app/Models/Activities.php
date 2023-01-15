<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class activities extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $fillables = [
      'matricid', 'activitiesid', 'activitiesimage', 'activitiestittle',
      'quantity', 'description', 'time','date',
    ];
    protected $primaryKey = 'activitiesid';
}

