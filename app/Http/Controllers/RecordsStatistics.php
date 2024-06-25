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
}
