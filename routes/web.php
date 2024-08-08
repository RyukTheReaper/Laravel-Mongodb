<?php

use Illuminate\Support\Facades\Route;


// use App\Http\Controllers\MovieController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/browse_movies', [MovieController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/staffReportView', function(){
//     return view('staffReport');
// });

Route::get('/staffReportView/{reportID}', [HRStatistics::class, 'viewStaffReport']);