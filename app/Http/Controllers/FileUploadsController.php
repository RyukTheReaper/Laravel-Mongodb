<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileUploadsController extends Controller
{
    //

    public function uploadMeetingMinutes(Request $request){
        try{

            $file = $request->file('file');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/meetings', $fileName);
    
            //This is the save directly to the db 
            //Another way to do it is to save to the db and return the id of the saved item
            // File::create([ 
            //     'original_name' => $file->getClientOriginalName(),
            //     'generated_name' => $fileName,
            // ]);

            //Implementing it this way returns information that might be usefull not sure what the full usecase for this would be
            //Saving to the report data
            $response = [
                'success' => true,
                'message' => 'File uploaded successfully',
                'data' => [
                    'original_name' => $file->getClientOriginalName(),
                    'generated_name' => $fileName,
                    
                ]
            ];              

        }catch(\Exception $e){
        // Exception occurred
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ];
        }

        return response($response, 200);

    }

    public function uploadEventPhoto(Request $request){
        try{

            $file = $request->file('file');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/photos', $fileName);

            //Implementing it this way returns information that might be usefull not sure what the full usecase for this would be
            //Saving to the report data
            $response = [
                'success' => true,
                'message' => 'File uploaded successfully',
                'data' => [
                    'original_name' => $file->getClientOriginalName(),
                    'generated_name' => $fileName,
                    
                ]
            ];              

        }catch(\Exception $e){
        // Exception occurred
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ];
        }

        return response($response, 200);

    }


    public function downloadFile(Request $request, string $fileType, string $fileName){
        
        try{

            $filePath = storage_path('app/uploads/' . $fileType . '/' . $fileName);

            if (file_exists($filePath)) {
                return response()->download($filePath);

                // $response = [
                //     'success' => true,
                //     'message' => 'File downloaded successfully',
                //     'data' => [
                //         'original_name' => $file->getClientOriginalName(),
                //         'generated_name' => $fileName,
                //         'file_path' => "app/uploads/meetings/" . $fileName,
                //     ]
                // ];       
            } else {
                // abort(404, 'File not found');
                $response = [
                    'success' => false,
                    'message' => 'File not found',
                    'data' => null
                ];
            }

    
        }catch(\Exception $e){
        // Exception occurred
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ];
        }

        return response($response, 200);

    }

}
