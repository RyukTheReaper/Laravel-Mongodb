<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;

/*
This is the Finance Statistics Controller responsible for doing 5 functions. 

The function initialize() creates the fields in mongo db for all  annual reports 
that are to be submitted by Staff.

The function store(), is similar but you would need to pass in all the fields with the 
information to properly create it in the database. 

The function getReport() retrieves the report based on the report ID. 

The function delReport() deleted the report based on the report ID. 

The last function updateReport() updates a report, it only updates the fields that are passed. 


Author: SW

*/

class FinanceStatistics extends Controller
{
    //Initialize 

    public function initialize(Request $request){

        try{

            $data = $request->all(); //Adding this in the event things need to be validated later on  

            $reportData = Finance::create([
                'academicYearID' => "",
                'department' => "",
                'deadline' => "",
                'income' => "",
                'expenditure' => "",
                'investments' => ""
            ]);

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

            $reportData = Finance::create([
                'academicYearID' => $data['academicYearID'],
                'department' => $data['department'],
                'deadline' => $data['deadline'],
                'income' => $data['income'],
                'expenditure' => $data['expenditure'],
                'investments' => $data['investments']
            ]);

            $response = [
                'success' => true,
                'message' => "Finance Statistics Report Created Successfully",
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
            $report = Finance::where('_id', $reportID)->first();

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
            $report = Finance::where('_id', $data['reportID'])->first();

            if ($report) {

                $report->academicYearID = $request->has('academicYearID') ? $data['academicYearID'] : $report->academicYearID;
                $report->department = $request->has('department') ? $data['department'] : $report->department;
                $report->deadline = $request->has('deadline') ? $data['deadline'] : $report->deadline;
                $report->income = $request->has('income') ? $data['income'] : $report->income;
                $report->expenditure = $request->has('expenditure') ? $data['expenditure'] : $report->expenditure;
                $report->investments = $request->has('investments') ? $data['investments'] : $report->investments;

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
            $report = Finance::where('_id', $id)->first();

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

}