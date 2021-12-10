<?php

namespace App\Http\Controllers;


use App\Models\Cat;
use Exception;
use Illuminate\Http\Request;

class adminCatController extends Controller
{
    public function index()
    {

        $data['cats'] = Cat::orderby('id', 'DESC')->paginate(10);
        return view('admin.cats.index')->with($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ]);
        Cat::create([

            'name' => json_encode([

                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),

        ]);

        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:cats,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ]);
        Cat::findorfail($request->id)->update([

            'name' => json_encode([

                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),

        ]);
        return back();
    }


    public function toggle(Cat $cat)
    {

        $cat->update([

            'active' => !$cat->active,

        ]);
        return back();
    }




    public function delete($id, Request $request)
    {

        $cat = Cat::findorfail($id);
        try {
            $cat->delete();
            $msg = 'row delete success';
        } catch (Exception $e) {

            $msg = 'can not row delete ';
        }
        $request->session()->flash('msg', $msg);
        return back();
    }
}
