<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;

class RecordsStatistics extends Controller
{
    //
    public function store(Request $request){

        $data = $request->all(); //Adding this in the event things need to be validated later on    

        try{

            $reportData = Records::create([
                'academicYearID' => $data['academicYearID'],
                'department' => $data['department'],
                'deadline' => $data['deadline'],
                'currentStudentEnrollment' => $data['currentStudentEnrollment'],
                'studentEnrollmentTrend' => $data['studentEnrollmentTrend'],
                'enrollmentTrendPerFaculty' => $data['enrollmentTrendPerFaculty'],
                'graduationStatistics'=> $data['graduationStatistics'],
                'studentOrigin' => $data['studentOrigin'],
                'campusStatistics' => $data['campusStatistics'],
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

    public function updateReport(Request $request){
        try {

            $data = $request->all();
            // $id = $request->input('reportID');

            // Retrieve data based on conditions (assuming $request has the id parameter)
            $report = Records::where('_id', $data['reportID'])->first();

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
}
