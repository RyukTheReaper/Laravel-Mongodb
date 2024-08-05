<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;

/*
This is the Records Statistics Controller responsible for doing 5 functions. 

The function initialize() creates the fields in mongo db for all  annual reports 
that are to be submitted by Staff.

The function store(), is similar but you would need to pass in all the fields with the 
information to properly create it in the database. 

The function getReport() retrieves the report based on the report ID. 

The function delReport() deleted the report based on the report ID. 

The last function updateReport() updates a report, it only updates the fields that are passed. 


Author: SW

*/

class RecordsStatistics extends Controller
{
    //Initialize function

    private function initializeReport(string $email){
        return $reportData = Records::create([
            'email' => $email,
            'academicYearID' => "2023-2024",
            'department' => "",
            'deadline' => "",
            'currentStudentEnrollmentTrend' => ['associates' => '', 'undergraduate' => '', 'graduate' => ''],
            'studentEnrollmentTrend' => Array(
              ['academicYear' => '2021/2022', 'associate' => '', 'undergraduate' => '', 'graduate' => '', 'other' => ''],
              ['academicYear' => '2022/2023', 'associate' => '', 'undergraduate' => '', 'graduate' => '', 'other' => ''],
              ['academicYear' => '2023/2024', 'associate' => '', 'undergraduate' => '', 'graduate' => '', 'other' => '']
            ),
            'enrollmentTrendPerFaculty' => Array(
              ['academicYear' => '2021/2022', 'educationAndArts' => '', 'managementAndSocialScience' => '', 'healthScience' => '', 'scienceAndTechnology' => ''],
              ['academicYear' => '2022/2023', 'educationAndArts' => '', 'managementAndSocialScience' => '', 'healthScience' => '', 'scienceAndTechnology' => ''],
              ['academicYear' => '2023/2024', 'educationAndArts' => '', 'managementAndSocialScience' => '', 'healthScience' => '', 'scienceAndTechnology' => ''],
            ),
            'graduationStatistics'=> Array(
              [
              'academicYear' => "2021/2022",
              'faculties' => Array(
                [ 'degree' => 'Education and Arts', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Management and Social Science', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Health Science', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Science and Technology', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
              )],
              [
              'academicYear' => "2022/2023",
              'faculties' => Array(
                [ 'degree' => 'Education and Arts', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Management and Social Science', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Health Science', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Science and Technology', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
              )],
              ['academicYear' => "2023/2024",
              'faculties' => Array(
                [ 'degree' => 'Education and Arts', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Management and Social Science', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Health Science', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
                [ 'degree' => 'Science and Technology', 'Associates' => '', 'Bachelors' => '', 'Honors' => '' ],
              )]
            ),
            'studentOrigin' => ['Belize' => '', 'CentralAmericanCountries' => '', 'OtherCountries' => ''],
            'campusStatistics' => ['BelizeCity' => '', 'Belmopan' => '', 'PuntaGorda' => '', 'CentralFarm' => '', 'SatellitePrograms' => ''],
            'graduates' => ['GraduatesByAge' => '', 'GraduatesByDistrict' => '']
        ]);
    }

    public function initialize(Request $request){

        try{

            $data = $request->all(); //Adding this in the event things need to be validated later on  

            $user = $request->user();            

            $reportData = $this->initializeReport($user->email);

            $response = [
                'success' => true,
                'message' => "Initialization Successfull",
                'data' => [
                'reportID' => $reportData->_id
                ],            
            ]; 
        }catch(\Exception $e){
            // If an error occurs, create an error response
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,            
            ]; 
        }

        return response($response, 201);

    }

    //Create

    public function store(Request $request){

        $data = $request->all(); //Adding this in the event things need to be validated later on    

        try{

            $reportData = Records::create([
                'academicYearID' => $data['academicYearID'],
                'department' => $data['department'],
                'deadline' => $data['deadline'],
                'currentStudentEnrollmentTrend' => $data['currentStudentEnrollmentTrend'],
                'studentEnrollmentTrend' => $data['studentEnrollmentTrend'],
                'enrollmentTrendPerFaculty' => $data['enrollmentTrendPerFaculty'],
                'graduationStatistics'=> $data['graduationStatistics'],
                'studentOrigin' => $data['studentOrigin'],
                'campusStatistics' => $data['campusStatistics'],
                'graduates' => $data['graduates'],
            ]);

            $response = [
                'success' => true,
                'message' => "Records Statistics Report Created Successfully",
                'data' => [
                'reportID' => $reportData->_id
                ],            
            ]; 
            
        }catch(\Exception $e){
            // If an error occurs, create an error response
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,            
            ]; 
        }
        
        return response($response, 201);        

    }

    //Read

    public function getReport(Request $request, string $reportID){
        try {

            // Retrieve data based on conditions (assuming $request has the id parameter)
            $report = Records::where('_id', $reportID)->first();

            if ($report) {
                    // Format success response
                $response = [
                    'success' => true,
                    'message' => 'Report data found successfully',
                    'data' => [
                        'reportData' => $report 
                    ]
                ];
            } else {
                // Report not found
                $response = [
                    'success' => false,
                    'message' => 'Report not found',
                    'data' => null
                ];
            }

    } catch (\Exception $e) {
            // Exception occurred
        $response = [
            'success' => false,
            'message' => $e->getMessage(),
            'data' => null
        ];
    }
     // Return response with HTTP status code 201 (Created)
     return response($response, 200);

    }

    //Update

    public function updateReport(Request $request){
        try {

            $data = $request->all();
            // $id = $request->input('reportID');

            // Retrieve data based on conditions (assuming $request has the id parameter)
            $report = Records::where('email', $data['email'])->first();

            if ($report) {

                $report->academicYearID = $request->has('academicYearID') ? $data['academicYearID'] : $report->academicYearID;
                $report->department = $request->has('department') ? $data['department'] : $report->department;
                $report->deadline = $request->has('deadline') ? $data['deadline'] : $report->deadline;
                $report->currentStudentEnrollmentTrend = $request->has('currentStudentEnrollmentTrend') ? $data['currentStudentEnrollmentTrend'] : $report->currentStudentEnrollmentTrend;
                $report->studentEnrollmentTrend = $request->has('studentEnrollmentTrend') ? $data['studentEnrollmentTrend'] : $report->studentEnrollmentTrend;
                $report->enrollmentTrendPerFaculty = $request->has('enrollmentTrendPerFaculty') ? $data['enrollmentTrendPerFaculty'] : $report->enrollmentTrendPerFaculty;
                $report->graduationStatistics = $request->has('graduationStatistics') ? $data['graduationStatistics'] : $report->graduationStatistics;
                $report->studentOrigin = $request->has('studentOrigin') ? $data['studentOrigin'] : $report->studentOrigin;
                $report->campusStatistics = $request->has('campusStatistics') ? $data['campusStatistics'] : $report->campusStatistics;
                $report->graduates = $request->has('graduates') ? $data['graduates'] : $report->graduates;

                $report->save();
                    // Format success response
                $response = [
                    'success' => true,
                    'message' => 'Report data updated successfully',
                    'data' => null
                ];
            } else {
                // Report not found
                $response = [
                    'success' => false,
                    'message' => 'Report not found',
                    'data' => null
                ];
            }

    } catch (\Exception $e) {
            // Exception occurred
        $response = [
            'success' => false,
            'message' => $e->getMessage(),
            'data' => null
        ];
    }
     // Return response with HTTP status code 201 (Created)
     return response($response, 200);

    }

    //Delete
    
    public function delReport(Request $request){
        try {

            // $data = $request->all();
            $id = $request->input('reportID');

            // Retrieve data based on conditions (assuming $request has the id parameter)
            $report = Records::where('_id', $id)->first();

            if ($report) {

                $report->delete();
                    // Format success response
                $response = [
                    'success' => true,
                    'message' => 'Report data deleted successfully',
                    'data' => null
                ];
            } else {
                // Report not found
                $response = [
                    'success' => false,
                    'message' => 'Report not found',
                    'data' => null
                ];
            }

    } catch (\Exception $e) {
            // Exception occurred
        $response = [
            'success' => false,
            'message' => $e->getMessage(),
            'data' => null
        ];
    }
     // Return response with HTTP status code 201 (Created)
     return response($response, 200);

    }

    public function getReportByUser(Request $request){
        try {

            // $data = $request->all();
            // $id = $request->input('reportID');

            // Retrieve data based on conditions (assuming $request has the id parameter)

            $user = $request->user();

            $report = Records::where('email', $user->email)->first();

            if ($report) {
                    // Format success response
                $response = [
                    'success' => true,
                    'message' => 'Report data found successfully',
                    'data' => [
                        'reportData' => $report 
                    ]
                ];
            } else {
                $report = $this->initializeReport($user->email);

                // Report not found
                $response = [
                    'success' => true,
                    'message' => 'Report Initialized.',
                    'data' => [
                        'reportData' => $report 
                    ],
                ];
            }

        } catch (\Exception $e) {
                // Exception occurred
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ];
        }
        // Return response with HTTP status code 201 (Created)
        return response($response, 200);

    }
    

}
