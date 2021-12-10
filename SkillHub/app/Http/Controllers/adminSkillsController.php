<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cat;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminSkillsController extends Controller
{
    public function index()
    {

        $data['skills'] = Skill::orderby('id', 'DESC')->paginate(10);
        $data['cats'] = Cat::select('id', 'name')->get();
        return view('admin.skills.index')->with($data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'required|image|max:2048',
            'cat_id' => 'required|exists:cats,id',
        ]);

        $imgPath = Storage::putFile('skills', $request->file('img'));

        Skill::create([

            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),

            'img' => $imgPath,
            'cat_id' => $request->cat_id,

        ]);

        return back();
    }


    public function delete(Skill $skill, Request $request)
    {


        try {
            $skill->delete();
            Storage::delete($skill->img);
            $msg = 'row delete success';
        } catch (Exception $e) {

            $msg = 'can not row delete ';
        }
        $request->session()->flash('msg', $msg);
        return back();
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:skills,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',

            'cat_id' => 'required|exists:cats,id',
        ]);

        $skill = Skill::findorfail($request->id);
        $path = $skill->img;
        if ($request->hasFile('img')) {
            $request->validate([
                'img' => 'required|image|max:2048',

            ]);
            Storage::delete($path);
            $path = Storage::putFile('skills', $request->file('img'));
        }

        $skill->update([

            'name' => json_encode([

                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),


            'img' => $path,
            'cat_id' => $request->cat_id,

        ]);
        return back();
    }

    public function toggle(Skill $skill)
    {

        $skill->update([

            'active' => !$skill->active,

        ]);
        return back();
    }


}
