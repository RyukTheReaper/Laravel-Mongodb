<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    //
    public function store(Request $request){


        $data = $request->all(); //Adding this in the event things need to be validated later on    

        try{

            $reportData = Staff::create([
                'academicYearID' => $data['academicYearID'],
                'department' => $data['department'],
                'reportsTo' => $data['reportsTo'],
                'deadline' => $data['deadline'],
                'missionStatement' => $data['missionStatement'],
                'strategicGoals' => $data['strategicGoals'],
                'accomplishments'=> $data['accomplishments'],
                'researchPartnerships' => $data['researchPartnerships'],
                'studentSuccess' => $data['studentSuccess'],
                'activities' => $data['activities'],
                'administrativeData' => $data['administrativeData'],
                'financialBudget' => $data['financialBudget'],
                'meetings'=> $data['meetings'],
                'otherComments' => $data['otherComments'],
            ]);

            $response = [
                'success' => true,
                'message' => "Staff Report Created Successfully",
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
            $report = Staff::where('_id', $reportID)->first();

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
            $report = Staff::where('_id', $id)->first();

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
            $report = Staff::where('_id', $data['reportID'])->first();

            if ($report) {

                $report->academicYearID = $request->has('academicYearID') ? $data['academicYearID'] : $report->academicYearID;
                $report->department = $request->has('department') ? $data['department'] : $report->department;
                $report->reportsTo = $request->has('reportsTo') ? $data['reportsTo'] : $report->reportsTo;
                $report->deadline = $request->has('deadline') ? $data['deadline'] : $report->deadline;
                $report->missionStatement = $request->has('missionStatement') ? $data['missionStatement'] : $report->missionStatement;
                $report->strategicGoals = $request->has('strategicGoals') ? $data['strategicGoals'] : $report->strategicGoals;
                $report->accomplishments = $request->has('accomplishments') ? $data['accomplishments'] : $report->accomplishments;
                $report->researchPartnerships = $request->has('researchPartnerships') ? $data['researchPartnerships'] : $report->researchPartnerships;
                $report->studentSuccess = $request->has('studentSuccess') ? $data['studentSuccess'] : $report->studentSuccess;
                $report->activities = $request->has('activities') ? $data['activities'] : $report->activities;
                $report->administrativeData = $request->has('administrativeData') ? $data['administrativeData'] : $report->administrativeData;
                $report->financialBudget = $request->has('financialBudget') ? $data['financialBudget'] : $report->financialBudget;
                $report->meetings = $request->has('meetings') ? $data['meetings'] : $report->meetings;
                $report->otherComments = $request->has('otherComments') ? $data['otherComments'] : $report->otherComments;

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
