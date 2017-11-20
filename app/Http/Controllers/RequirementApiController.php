<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University as University;
use App\Requirement as Requirement;
use App\UniversityRequirement as UniversityRequirement;

class RequirementApiController extends Controller
{
        
     public function getRequirement(){
    	$requirement = Requirement::all();
        
    	return $requirement;
    }
    
    public function getRequirementFor($uniId){
            $requirement = UniversityRequirement::where('u_id',$uniId)
                                                    ->get();
            
            if(sizeof($requirement)==0){
                return response()->json([
                                            'message' => 'No Data',
                                        ], 400);
                }
            return $requirement;
            
    }
    
     
     
     public function postRequirement(Request $details){
    
            $requirement = new Requirement;
            
            $requirement ->name = $details->input('requirement');
            
            if($requirement ->save()){
                    return $requirement ;
            }
        }
        
        
     public function postRequirementFor(Request $details){
    
            $requirement = new UniversityRequirement;
            
            $requirement ->u_id = $details->input('uniId');
            $requirement ->r_id = $details->input('requirementId');
            $requirement ->requirement_for = $details->input('requirementFor');
            $requirement ->description = $details->input('description');
            
            if($requirement ->save()){
                    return $requirement ;
            }
        }   
        
        
     public function sortUniversityBy($requirement,$inverse){
            $requirementName = $requirement;
            $index = 0;     
            $uniArray = ["no data"];
            
            if($inverse == 0){
                $requirementArray = Requirement::where('name',$requirementName)
                                                ->get();
            }else if($inverse ==1){
                $requirementArray = Requirement::where('name',"!=",$requirementName)
                                                ->get();    
            }else{
                return response()
                        ->json(['message' => 'Invalid inverse parameter'], 400); 
            }
                                        
            if(sizeof($requirementArray)<=0){
                return response()
                        ->json(['message' => 'No Data'], 400);
            }
                                                               
                                             
            foreach($requirementArray as $requirement){
                $requirementId = $requirement->id;
                $uniRequirement = UniversityRequirement::where('r_id',$requirementId)
                                ->get();
                                                      

                foreach($uniRequirement as $requirementDetails){
                     $uniArray[$index++] = University::where('id',$requirementDetails->u_id)
                                        ->get();
                } 
            }
            $uniqueArr = array_unique($uniArray);      

            return response()
                ->json(['data'=>$uniqueArr]);
                
                
        }
                   
}
