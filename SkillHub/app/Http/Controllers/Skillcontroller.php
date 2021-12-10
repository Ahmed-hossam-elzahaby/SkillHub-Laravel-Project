<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class Skillcontroller extends Controller
{
    public function show($id){

$data['skill'] = Skill::findorfail($id);


        return view('web.skills.show')->with($data);
        
            }
}
