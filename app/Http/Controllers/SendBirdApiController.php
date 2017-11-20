<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendBird as SendBird;

class SendBirdApiController extends Controller
{
  public function createSendBirdUser(Request $details){
     try{
        $sendBird = new SendBird;
             
        $sendBird->user_id = $details->input('userId');
        $sendBird->sendbird_id = $details->input('sendBirdId');

          
        if($sendBird->save()){
          return $sendBird->id;      
        }else{
                       return Redirect::back();
        }
      }catch(Exception $ex){

                return Redirect::back();

      }
        
  }
}
