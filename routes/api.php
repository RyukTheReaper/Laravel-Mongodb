<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RecordsStatistics;
use App\Http\Controllers\HRStatistics;
use App\Http\Controllers\FinanceStatistics;
use App\Http\Controllers\FileUploadsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneratePdf;



//This will be the only unprotected route because this is used for authentication
Route::post('authenticate', [AuthController::class, 'AuthenticateUser']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    // Add any route that needs to be protected inside this group

    //Initialize
    Route::post('/facultyInitialize', [FacultyController::class, 'initialize']); //This route should get the data that is passed in the UI 

    Route::post('/staffInitialize', [StaffController::class, 'initialize']); //This route should get the data that is passed in the UI 

    Route::post('/recordsInitialize', [RecordsStatistics::class, 'initialize']); //This route should get the data that is passed in the UI 

    Route::post('/HRInitialize', [HRStatistics::class, 'initialize']); //This route should get the data that is passed in the UI 

    Route::post('/financeInitialize', [StaffController::class, 'initialize']); //This route should get the data that is passed in the UI 

    //Create

    Route::post('/facultyReport', [FacultyController::class, 'store']); //This route should get the data that is passed in the UI 

    Route::post('/staffReport', [StaffController::class, 'store']); //This route should get the data that is passed in the UI 

    Route::post('/recordsReport', [RecordsStatistics::class, 'store']); //This route should get the data that is passed in the UI 

    Route::post('/HRReport', [HRStatistics::class, 'store']); //This route should get the data that is passed in the UI 

    Route::post('/financeReport', [FinanceStatistics::class, 'store']); //This route should get the data that is passed in the UI 

    //Read 

    Route::get('/facultyReport/{reportID}', [FacultyController::class, 'getReport']); //This route should get the data that is passed in the UI 
    Route::get('/facultyReportByUser', [FacultyController::class, 'getReportByUser']); //This route should get the data that is passed in the UI 

    Route::get('/staffReport/{reportID}', [StaffController::class, 'getReport']); //This route should get the data that is passed in the UI 
    Route::get('/staffReportByUser', [StaffController::class, 'getReportByUser']); //This route should get the data that is passed in the UI 

    Route::get('/recordsReport/{reportID}', [RecordsStatistics::class, 'getReport']); //This route should get the data that is passed in the UI 
    Route::get('/recordsReportByUser', [RecordsStatistics::class, 'getReportByUser']); //This route should get the data that is passed in the UI 

    Route::get('/HRReport/{reportID}', [HRStatistics::class, 'getReport']); //This route should get the data that is passed in the UI 
    Route::get('/HRReportByUser', [HRStatistics::class, 'getReportByUser']); //This route should get the data that is passed in the UI H

    Route::get('/financeReport/{reportID}', [FinanceStatistics::class, 'getReport']); //This route should get the data that is passed in the UI 
    Route::get('/financeReportByUser', [FinanceStatistics::class, 'getReportByUser']); //This route should get the data that is passed in the UI H

    //Update

    Route::put('/facultyReport', [FacultyController::class, 'updateReport']); 

    Route::put('/staffReport', [StaffController::class, 'updateReport']); 

    Route::put('/recordsReport', [RecordsStatistics::class, 'updateReport']); 

    Route::put('/HRReport', [HRStatistics::class, 'updateReport']); 

    Route::put('/financeReport', [FinanceStatistics::class, 'updateReport']); 

    //Delete

    Route::delete('/facultyReport', [FacultyController::class, 'delReport']); 

    Route::delete('/staffReport', [StaffController::class, 'delReport']); 

    Route::delete('/recordsReport', [RecordsStatistics::class, 'delReport']); 

    Route::delete('/HRReport', [HRStatistics::class, 'delReport']); 

    Route::delete('/financeReport', [FinanceStatistics::class, 'delReport']); 

    //Upload files

    Route::post('/uploadPhoto', [FileUploadsController::class, 'uploadEventPhoto']); //This route should get the data that is passed in the UI 

    Route::post('/uploadMeetings', [FileUploadsController::class, 'uploadMeetingMinutes']); //This route should get the data that is passed in the UI 
    
    /*Download files
     The name of the contoller if FileUploadsController but I thought I could add in the download function in there one time 
     as opposed to creating another controller for one function
     You will pass the kind of file to download, by this I mean, you will pass if its a meeting or photo file, and file name(to download)*/

    Route::get('/getFile/{fileType}/{fileName}', [FileUploadsController::class, 'downloadFile']);



});


    /*Generate pdf file*/
    Route::get('/generate-pdf/{reportID}', [StaffController::class, 'generateStaffPdf']);



    // Route::get('/testpdf', function () {
    //     return view('pdfReport');
    // });






//-----------original sanctum code ---------------------------
// Route::post('sanctum/token', function (Request $request) {
//     try {
//         $request->validate([
//             'samaccountname' => 'required|string', //test
//             'password' => 'required|string',
//             'device_name' => 'required|string',
//         ]);

//         // Attempt authentication
//         if (Auth::attempt($request->only('samaccountname', 'password'))) {
//             // Authentication successful
//             $user = Auth::user(); // Retrieve authenticated user

//             // Generate Sanctum token for the user
//             $token = $user->createToken($request->device_name)->plainTextToken;

//             return response()->json(['token' => $token]);
//         }

//         // Authentication failed
//         throw ValidationException::withMessages([
//             'samaccountname' => ['The provided credentials are incorrect.'],
//         ]);
//     } catch (ValidationException $e) {
//         // Catch and rethrow ValidationException to handle validation errors
//         throw $e;
//     } catch (\Exception $e) {
//         // Handle other exceptions (e.g., LDAP connection issues)
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// });

// Route::post('sanctum/token', function (Request $request) {
//     try{
//         $request->validate([
//             'username' => 'required|string',
//             'password' => 'required',
//             'device_name'=>'required',
//         ]);

//         $credentials = [
//             'username' =>$request->username,
//             'password' =>$request->password,
//         ];

//         if(Auth::validate($credentials)){
//             $user = Auth::getLastAttempted();

//             return[
//                 'token' =>$user->createToken($request->device_name)->plainTextToken
//             ];

//         }
//         throw ValidationException::withMessages([
//             'email'=>['The provided credentials are incorrect'],
//         ]);
//     }catch(\Exception $e){
//         //If an error occurs, create an error response 
//         $response = [
//             'success' => false,
//             'messages' => $e->getMessages(),
//             'data' => null,
//         ];
//     }
//     return response($response, 201);

// });



Route::post('ldaptest', function (Request $request) {

    try {
        // Retrieve username from the request JSON data
        $username = $request->input('username');

        // Build LDAP query to check if user exists
        $user = LdapUser::where('samaccountname', '=', $username)
                        ->select('samaccountname', 'memberof') // Specify attributes to retrieve
                        ->firstOrFail();

        // User found in AD
        $groups = $user->memberof; // Retrieve the memberof attribute (array of group DNs)

        // Parse group names from DNs (if needed)
        $groupNames = [];
        foreach ($groups as $group) {
            // Example: Extract CN from DN
            preg_match('/CN=([^,]+)/', $group, $matches);
            if (isset($matches[1])) {
                $groupNames[] = $matches[1];
            }
        }

        return response()->json([
            'message' => 'User exists in Active Directory',
            'username' => $user->samaccountname,
            'memberof' => $groupNames, // Array of group names
        ]);
    } catch (ModelNotFoundException $e) {
        // User not found in AD
        return response()->json(['message' => 'User does not exist in Active Directory'], 404);
    } catch (\Exception $e) {
        // Handle other exceptions (e.g., LDAP connection issues)
        return response()->json(['error' => 'Failed to check user in Active Directory'], 500);
    }
});