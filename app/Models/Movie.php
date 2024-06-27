<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

//This is just test model 
class Movie extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
}
