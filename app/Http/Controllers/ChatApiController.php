<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendBird as SendBird;

class ChatApiController extends Controller
{
    public function getOnlineUser(){
    	$onlineUsers = SendBird::all();
    	return $onlineUsers;

    }
    
    public function getCounselor(){
        $counselor = SendBird::select('sendbird_id')
                             ->where('type','counselor')
                             ->get();
        return $counselor;                     
    }
}
