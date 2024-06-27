<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RecordsStatistics;
use App\Http\Controllers\HRStatistics;
use App\Http\Controllers\FinanceStatistics;
use App\Http\Controllers\FileUploadsController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/facultyReport', [FacultyController::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/staffReport', [StaffController::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/recordsReport', [RecordsStatistics::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/HRReport', [HRStatistics::class, 'store']); //This route should get the data that is passed in the UI 

Route::post('/financeReport', [FinanceStatistics::class, 'store']); //This route should get the data that is passed in the UI 

// Route::get('/test', function(){
//     return "testing...";
// });

Route::get('/facultyReport/{reportID}', [FacultyController::class, 'getReport']); //This route should get the data that is passed in the UI 

Route::get('/staffReport/{reportID}', [StaffController::class, 'getReport']); //This route should get the data that is passed in the UI 

Route::get('/recordsReport/{reportID}', [RecordsStatistics::class, 'getReport']); //This route should get the data that is passed in the UI 

Route::get('/HRReport/{reportID}', [HRStatistics::class, 'getReport']); //This route should get the data that is passed in the UI 

Route::get('/financeReport/{reportID}', [FinanceStatistics::class, 'getReport']); //This route should get the data that is passed in the UI 


Route::delete('/facultyReport', [FacultyController::class, 'delReport']); 

Route::delete('/staffReport', [StaffController::class, 'delReport']); 

Route::delete('/recordsReport', [RecordsStatistics::class, 'delReport']); 

Route::delete('/HRReport', [HRStatistics::class, 'delReport']); 

Route::delete('/financeReport', [FinanceStatistics::class, 'delReport']); 

//Create the rest of the update functions for the other controllers
Route::put('/facultyReport', [FacultyController::class, 'updateReport']); 

Route::put('/staffReport', [StaffController::class, 'updateReport']); 

Route::put('/recordsReport', [RecordsStatistics::class, 'updateReport']); 

Route::put('/HRReport', [HRStatistics::class, 'updateReport']); 

Route::put('/financeReport', [FinanceStatistics::class, 'updateReport']); 


Route::post('/uploadPhoto', [FileUploadsController::class, 'uploadEventPhoto']); //This route should get the data that is passed in the UI 

Route::post('/uploadMeetings', [FileUploadsController::class, 'uploadMeetingMinutes']); //This route should get the data that is passed in the UI 


//The name of the contoller if FileUploadsController but I thought I could add in the download function in there one time 
//as opposed to creating another controller for one function

//You will pass the kind of file to download, by this I mean, you will pass if its a meeting or photo file, and file name(to download)
Route::get('/getFile/{fileType}/{fileName}', [FileUploadsController::class, 'downloadFile']);