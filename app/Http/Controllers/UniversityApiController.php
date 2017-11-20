<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\University as University;
use App\UniversityAddress as UniversityAddress;
use App\UniversityContent as UniversityContent;
use App\Ranking as Ranking;
use App\UniversityMapping as UniversityMapping;


class UniversityApiController extends Controller
{
// ==== for university ==========

    public function getUniversity(){
    	$university = University::all();
        
    	return $university;
    }
    
    public function getThisUniversity($id){
    	$university = University::find($id);
        
        if(!$university){
                return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
        }
    	return $university;
    }
    
    public function getUniversityByCountry($country){
    	$university = University::where('country',$country)
                                ->get();
        
        if(!$university){
                return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
        }
    	return $university;
    }
    
    
     public function postUniversity(Request $details){
    
            $uniDetails = new University;
            
            $uniDetails->country = $details->input('country');
            $uniDetails->name= $details->input('name');
            $uniDetails->logo_url = $details->input('logoUrl');

            if($uniDetails->save()){
                    return $uniDetails;
            }
        }
        
        
        
        
   public function putUniversity(Request $details, $id){
           if (!$id) {
                return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 200);
        }


            $uniDetails = University::find($id);
                if(!$uniDetails){
                        return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
                }

            $uniDetails->country = $details->input('country');
            $uniDetails->name= $details->input('name');
            $uniDetails->logo_url = $details->input('logoUrl');
            
            if($uniDetails->save()){
                    return $uniDetails;
            }
            
            
   }
    
    public function deleteUniversity($id){
        if (!$id) {
             return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 200);
        }

        $uniDetails = University::find($id);
                if(!$uniDetails){
                        return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
                }
        $uniDetails->delete();

        return response()->json([
            'message' => 'University Deleted',
        ], 200);
    }
    
    
    

// ====  for university address ==========
    public function getUniversityAddress(){
    	$uniAddress = UniversityAddress::all();
        
    	return $uniAddress;
    }
    
    public function getThisUniversityAddress($id){
    	$uniAddress = UniversityAddress::find($id);
        
        if(!$uniAddress){
                return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
        }
    	return $uniAddress;
    }
    
    
    public function postUniversityAddress(Request $details){
    
            $uniDetails = new UniversityAddress;
            
            $uniDetails->uni_id = $details->input('uniId');
            $uniDetails->country = $details->input('country');
            $uniDetails->state= $details->input('state');
            $uniDetails->city = $details->input('city');
            $uniDetails->street = $details->input('street');
            $uniDetails->zip_code = $details->input('zipCode');
            $uniDetails->save();
            
            return Redirect::back();
        }
        
        
        
        
   public function putUniversityAddress(Request $details, $id){
           if (!$id) {
                return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 200);
        }


            $uniDetails = UniversityAddress::find($id);
                if(!$uniDetails){
                        return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
                }

            $uniDetails->country = $details->input('country');
            $uniDetails->state= $details->input('state');
            $uniDetails->city = $details->input('city');
            $uniDetails->street = $details->input('street');
            $uniDetails->zip_code = $details->input('zipCode');
            
            if($uniDetails->save()){
                    return $uniDetails;
            }
            
            
   }
   
   
   public function deleteUniversityAddress($id){
        if (!$id) {
             return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 200);
        }

        $uniDetails = UniversityAddress::find($id);
                if(!$uniDetails){
                        return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
                }
        $uniDetails->delete();

        return response()->json([
            'message' => 'University Address deleted',
        ], 200);
    }
    
    
    // ====  for university content ==========
    
    public function getUniversityContent(){
        $uniContent = UniversityContent::all();
        
        return $uniContent;
    }
    
    public function getThisUniversityContent($id){
        $uniContent = UniversityContent::find($id);
        
        if(!$uniContent){
                return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
        }
        return $uniContent;
    }
    
    
    public function postUniversityContent(Request $details){
    
            $uniDetails = new UniversityContent;
            
            $uniDetails->u_id = $details->input('uId');
            $uniDetails->h_id= $details->input('hId');
            $uniDetails->sh_id = $details->input('shId');
            $uniDetails->description = $details->input('description');
            if($uniDetails->save()){
                return $uniDetails;
            }
        }
        
        
        
        
   public function putUniversityContent(Request $details, $id){
       if (!$id) {
            return response()->json([
                                        'message' => 'Invalid ID',
                                    ], 200);
       }


        $uniDetails = UniversityContent::find($id);
            if(!$uniDetails){
                    return response()->json([
                                        'message' => 'Invalid ID',
                                    ], 400);
            }

        $uniDetails->u_id = $details->input('uId');
        $uniDetails->h_id= $details->input('hId');
        $uniDetails->sh_id = $details->input('shId');
        $uniDetails->description = $details->input('description');
        if($uniDetails->save()){
            return $uniDetails;
        }
   }
   
   
   public function deleteUniversityContent($id){
        if (!$id) {
             return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 200);
        }

        $uniDetails = UniversityContent::find($id);
                if(!$uniDetails){
                        return response()->json([
                                            'message' => 'Invalid ID',
                                        ], 400);
                }
        $uniDetails->delete();

        return response()->json([
            'message' => 'University Content Deleted',
        ], 200);
    }
    
    
    
    // ==== for university rank ==========    
    public function getUniversityRank($uniId){
    	$rank = Ranking::where('u_id',$uniId)
                        ->get();
        
        if(!$rank){
                return response()->json([
                                            'message' => 'Invalid Data or No Data',
                                        ], 400);
        }elseif(sizeof($rank)==0){
                return response()->json([
                                            'message' => 'No Data',
                                        ], 400);
                }
    	
        return $rank;
    }
    
    public function sortUniversityRank($sortAs){
    	$rank = Ranking::orderBy('ranking',$sortAs)
                        ->get();
                        
        
        if(!$rank){
                return response()->json([
                                            'message' => 'Invalid Data or No Data',
                                        ], 400);
        }elseif(sizeof($rank)==0){
                return response()->json([
                                            'message' => 'No Data',
                                        ], 400);
                }
    	
        return $rank;
    }
    
    
    
    public function sortUniversityByType($type,$sortAs){
    	$rank = Ranking::where('ranking_type',$type)
                        ->orderBy('ranking',$sortAs)
                        ->get();
                        
        
        if(!$rank){
                return response()->json([
                                            'message' => 'Invalid Data or No Data',
                                        ], 400);
        }elseif(sizeof($rank)==0){
                return response()->json([
                                            'message' => 'No Data',
                                        ], 400);
                }
    	
        return $rank;
    }
    
    
    
    
      public function postUniversityRank(Request $details){
    
            $uniRank= new Ranking;
            
            $uniRank->u_id = $details->input('uId');
            $uniRank->ranking= $details->input('ranking');
            $uniRank->ranking_type = $details->input('rankingType');
            
            if($uniRank->save()){
               return response()->json([
                                            'message' => 'Rank Stored',
                                        ], 200);     
            }
            
            

        }
    
            
}// end class UniversityController
