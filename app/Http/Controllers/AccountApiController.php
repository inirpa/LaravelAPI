<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Users as User;
use App\SendBird as SendBird;


use Response;
use Hash;
use Exception;


class AccountApiController extends Controller
{
    //
   public function saveUser(Request $details){
      try{
        $user = new User;
             
        $user->first_name = $details->input('firstName');
        $user->middle_name = $details->input('middleName');
        $user->last_name = $details->input('lastName');

        $user->email = $details->input('email');
        
        $user->password = $details->input('password');
        $user->apply_for = $details->input('applyingFor');
        $user->dob = $details->input('dob');
        $user->mobile = $details->input('mobileNumber');
          
        if($user->save()){
          return $user->id;      
        }else{ 
                       return Redirect::back();
        }
      }catch(Exception $ex){

                return Redirect::back();

      }
        
   }
   
   public function logInUser(Request $details){
           $email = $details->input('email');
           $hashPass = $details->input('password');                   
 
           $userPass = User::where('email',$email)
                         ->select('password')
                         ->get();
           if(sizeof($userPass)==0)
                    return response()->json(["status" => "404"]);
                   
                   
           foreach($userPass as $pass)              
                  $p=  $pass->password;
           
           
           if (Hash::check($hashPass, $p)){
                   return response()->json(["status" => $email]); 
                   }

                   
           else
                 return response()->json(["status" => "404"]);   
           
   }
   
   public function getFullName(Request $detail){
         
          $getName = User::select('first_name','middle_name','last_name')
                          ->where('email',$detail->email)
                          ->get();
          if(sizeof($getName)==0) 
                  return response()->json(["Full Name"=>""]);
          else        
          foreach($getName as $name){
                  $fname = $name->first_name;
                  $mname = $name->middle_name;
                  $lname = $name->last_name;
          }
          
          return response()->json(["Full Name"=>$fname." ".$mname." ".$lname]);
                          
   }
   
   public function getUserType(Request $detail){
           $getUserType = SendBird::select('type')
                                   ->where('sendbird_id',$detail->sendBirdId)
                                   ->get();
                                           
           if(sizeof($getUserType)==0){
                   return response()->json(["User Type" => ""]);
           }else
           foreach($getUserType as $userType)
                   return response()->json(["User Type"=>$userType->type]);
                                   
           
   }
    
}
