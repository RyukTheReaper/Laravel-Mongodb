<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    //
    public function store(Request $request){

        // return "Test working from controller....updated"; 

        // $data = $request->all();
        // //will try to create a new faculty document in MongoDB this way
        // $faculty = Faculty::create($data); //This should create a new faculty document in mongo


        // $faculty = new $Faculty(); 
        // $faculty->fill($data);
        // $faculty->save();

        // $facultyName = request->input('faculty');
        // $units = request->input('unit');
        // $dateEntered = request->input('Date');
        // $missionStatement = request->input('missionStatement');
        // $strategicGoals = request->input('');

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
}
