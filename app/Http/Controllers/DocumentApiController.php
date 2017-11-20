<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document as Document;
//use Request;
use DB;
use Input;
use Response;

class DocumentApiController extends Controller
{
    //
    public function getDocuments(){
    	$documents = Document::all();
    	return $documents;
    }
    
    public function getThisDocuments($id){
    	$documents = Document::where('user_id',$id)
                                ->get();
    	return $documents;
    }
    
    public function getFilteredDocuments($status){
    	$documents = Document::where('status',$status)
                        ->get();
    	return $documents;
    }
    
    public function postDocuments(Request $details){
        $documents = new Document;
    
        $documents->user_id = $details->input('userId');
        $documents->path= $details->input('path');
        $documents->type = $details->input('type');
        $documents->status = $details->input('status');

        $documents->save();
        
                  
               
      
    }
    
     public function putDocuments(Request $documentDetails, $id){
    	if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $document = Document::find($id);

        $document->user_id = $documentDetails->input('userId');
        $document->path = $documentDetails->input('path');
        $document->status = $documentDetails->input('status');
        $document->type = $documentDetails->input('type');
        

        if ($document->save()) {
            return $document;
        }

        throw new HttpException(400, "Invalid data");
    }
    
    public function deleteDocuments($id){
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $document = Document::find($id);
        $document->delete();

        return response()->json([
            'message' => 'Document deleted',
        ], 200);
    }
    
}
