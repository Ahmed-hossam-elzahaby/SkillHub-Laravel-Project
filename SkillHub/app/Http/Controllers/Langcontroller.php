<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Langcontroller extends Controller
{
    public function set($lang , Request $request){

$accept = ['en','ar'];
if(! in_array($lang,$accept)){
$lang='en';
}


$request->session()->put('lang',$lang);
return back();
    }
}
