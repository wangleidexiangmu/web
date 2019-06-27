<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB;
class WebController extends Controller
{
    public function add(){
      // print_r( $_SERVER);
       $data=[
           'user_id'=>mt_rand(0,1000),
           'ip'=>$_SERVER['REMOTE_ADDR'],
           'url'=>$_SERVER['REQUEST_URI'],
           'UA'=>$_SERVER['HTTP_USER_AGENT'],
           'addtime'=>time()
       ];
         $res= DB::table('web')->insert($data);
     var_dump($res);
    }
    public function mon(){
        $data=[
            'user_id'=>mt_rand(0,1000),
            'ip'=>$_SERVER['REMOTE_ADDR'],
            'url'=>$_SERVER['REQUEST_URI'],
            'UA'=>$_SERVER['HTTP_USER_AGENT'],
            'addtime'=>time()
        ];
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->demo->beers;
        $result = $collection->insertOne( $data );
        var_dump($result);
    }
}
