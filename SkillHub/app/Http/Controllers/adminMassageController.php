<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class adminMassageController extends Controller
{
    public function index()
    {
        $data['massages'] = Message::paginate(10);

        return view('admin.massages.index')->with($data);
    }

public function show($id){


$data['massage']=Message::findorfail($id);
return view('admin.massages.show')->with($data);



}




}
