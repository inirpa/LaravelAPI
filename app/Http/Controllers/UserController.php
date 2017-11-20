<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\allUser as allUser;	

class UserController extends Controller
{
    //
    public function getUsers(){
    	$user = allUser::all();
        //paginate(10);

        if (!$user) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $user,
            200
        );
    }

    public function putUsers(Request $userDetails){
        $user = new allUser;

        $user->name = $userDetails->input('userName');
        $user->email = $userDetails->input('userEmail');
        $user->type = $userDetails->input('userType');

         if ($user->save()) {
            return $user;
        }

        throw new HttpException(400, "Invalid data");

    }
}
