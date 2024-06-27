<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    //
    public function store(Request $request){

        $data = $request->all(); //Adding this in the event things need to be validated later on    

        try{

            $reportData = Faculty::create([
                'academicYearID' => $data['academicYearID'],
                'faculty' => $data['faculty'],
                'units' => $data['units'],
                'deadline' => $data['deadline'],
                'missionStatement' => $data['missionStatement'],
                'strategicGoals' => $data['strategicGoals'],
                'accomplishments'=> $data['accomplishments'],
                'researchPartnerships' => $data['researchPartnerships'],
                'academicPrograms' => $data['academicPrograms'],
                'courses' => $data['courses'],
                'eliminatedPrograms' => $data['eliminatedPrograms'],
                'retentionInitiatives' => $data['retentionInitiatives'],
                'studentInternships' => $data['studentInternships'],
                'degreesConferred' => $data['degreesConferred'],
                'studentSuccess' => $data['studentSuccess'],
                'activities' => $data['activities'],
                'administrativeData' => $data['administrativeData'],
                'financialBudget' => $data['financialBudget'],
                'meetings'=> $data['meetings'],
                'otherComments' => $data['otherComments'],
            ]);

            $response = [
                'success' => true,
                'message' => "Faculty Report Created Successfully",
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

            // $data = $request->all();
            // $id = $request->input('reportID');

            // Retrieve data based on conditions (assuming $request has the id parameter)
            $report = Faculty::where('_id', $reportID)->first();

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
            $report = Faculty::where('_id', $id)->first();

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
            $report = Faculty::where('_id', $data['reportID'])->first();

            if ($report) {

                $report->academicYearID = $request->has('academicYearID') ? $data['academicYearID'] : $report->academicYearID;
                $report->faculty = $request->has('faculty') ? $data['faculty'] : $report->faculty;
                $report->units = $request->has('units') ? $data['units'] : $report->units;
                $report->deadline = $request->has('deadline') ? $data['deadline'] : $report->deadline;
                $report->missionStatement = $request->has('missionStatement') ? $data['missionStatement'] : $report->missionStatement;
                $report->strategicGoals = $request->has('strategicGoals') ? $data['strategicGoals'] : $report->strategicGoals;
                $report->accomplishments = $request->has('accomplishments') ? $data['accomplishments'] : $report->accomplishments;
                $report->researchPartnerships = $request->has('researchPartnerships') ? $data['researchPartnerships'] : $report->researchPartnerships;
                $report->academicPrograms = $request->has('academicPrograms') ? $data['academicPrograms'] : $report->academicPrograms;
                $report->courses = $request->has('courses') ? $data['courses'] : $report->courses;
                $report->eliminatedPrograms = $request->has('eliminatedPrograms') ? $data['eliminatedPrograms'] : $report->eliminatedPrograms;
                $report->retentionInitiatives = $request->has('retentionInitiatives') ? $data['retentionInitiatives'] : $report->retentionInitiatives;
                $report->studentInternships = $request->has('studentInternships') ? $data['studentInternships'] : $report->studentInternships;
                $report->degreesConferred = $request->has('degreesConferred') ? $data['degreesConferred'] : $report->degreesConferred;
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

    
