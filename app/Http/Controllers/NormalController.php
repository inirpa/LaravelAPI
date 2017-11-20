<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalController extends Controller
{
    //
    public function getUsers(){
    	$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'hoteltest.co.nf/getUsers');

		$result = $res->getBody();
		return $result;
	
		//$decoded = json_decode($result);

		//print_r($decoded);

}
}
