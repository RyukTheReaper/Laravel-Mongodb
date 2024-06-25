<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class HumanResources extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'HRStatistics'; // Specify the collection name if different from the default

    protected $fillable = [
        'userID',
        'academicYearID',
        'department',
        'reportsTo',
        'deadline',
        'numberOfStaff',
    ];
}
