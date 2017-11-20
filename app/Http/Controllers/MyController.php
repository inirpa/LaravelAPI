<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
/*
use GuzzleHttp\Exception\GuzzleException;
*/

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Book;

class MyController extends Controller
{
    public function save(){
    	return view('newItem'); 
    }

    public function storeIt(Request $det){
    	$client = new Client();
        $res = $client->request('POST', 'http://localhost:8000/api/books/', [
            'form_params' => [
                'title' => $det->input('title'),
                'price' => $det->input('price'),
                'author' => $det->input('author'),
                'editor' => $det->input('editor')
            ]
        ]);

        $result= $res->getBody();
        dd($result);
        
        print('ok');
    }
}
