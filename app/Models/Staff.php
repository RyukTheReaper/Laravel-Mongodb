<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model; //Needs this inorder to use MongoDB
use MongoDB\Laravel\Relations\BelongsTo;
use App\Models\User;


/*
This is the staff model, the following fields are used to 
populate the 'staff' annual report in mongo.

Author: SW

*/

class Staff extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'staff'; // Specify the collection name if different from the default

    protected $fillable = [
        'email',
        'userID',
        'academicYearID',
        'department',
        'reportsTo',
        'deadline',
        'missionStatement',
        'strategicGoals',
        'accomplishments',
        'researchPartnerships',
        'studentSuccess',
        'activities',
        'administrativeData',
        'financialBudget',
        'meetings',
<<<<<<< HEAD
        'otherComments',
        'formSubmitted'
=======
        'formSubmitted',
        'otherComments'
>>>>>>> ae3ea742905e511c14633bb540ea9869c9006e04
    ];

    public function user()
    {
        return User::where('email', $this->email)->first();
    }
}
