<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RecordsStatistics;
use App\Http\Controllers\HRStatistics;
use App\Http\Controllers\FinanceStatistics;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/facultyReport', [FacultyController::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/staffReport', [StaffController::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/recordsReport', [RecordsStatistics::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/HRReport', [HRStatistics::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/financeReport', [FinanceStatistics::class, 'store']); //This route should get the data that is passed in the UI 

Route::get('/test', function(){
    return "testing...";
});