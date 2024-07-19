<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model; 
use MongoDB\Laravel\Eloquent\Model; //Needs this inorder to use MongoDB 

/*
This is the Faculty model, the following fields are used to 
populate the 'Faculty' annual report in mongo.

Author: SW

*/

class Faculty extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'faculties'; // Specify the collection name if different from the default

    protected $fillable = [
        'userID',
        'academicYearID',
        'faculty',
        'units',
        'deadline',
        'missionStatement',
        'strategicGoals',
        'accomplishments',
        'researchPartnerships',
        'academicPrograms',
        'courses',
        'eliminatedPrograms',
        'retentionInitiatives',
        'studentInternships',
        'degreesConferred',
        'studentSuccess',
        'activities',
        'administrativeData',
        'financialBudget',
        'meetings',
        'otherComments'
    ];

}