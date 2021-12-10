<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){

return view('web.index');

    }
}
