<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
 public function getUsers()
 {
 $getAllUsersArray = DB::table('users')->select('*')->get();

foreach($getAllUsersArray as $allUsers)
{
 echo $allUsers->name."<br>";
}

 
 }
}
