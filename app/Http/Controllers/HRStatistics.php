<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HumanResources;

class HRStatistics extends Controller
{
    //
    public function store(Request $request){

        $data = $request->all(); //Adding this in the event things need to be validated later on    

        try{

            $reportData = HumanResources::create([
                'academicYearID' => $data['academicYearID'],
                'department' => $data['department'],
                'deadline' => $data['deadline'],
                'numberOfStaff' => $data['numberOfStaff'],
            ]);

            $response = [
                'success' => true,
                'message' => "HR Statistics Report Created Successfully",
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
