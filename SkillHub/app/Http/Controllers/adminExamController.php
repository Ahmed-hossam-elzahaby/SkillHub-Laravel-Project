<?php

namespace App\Http\Controllers;

use App\Events\examAddEvent;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminExamController extends Controller
{

    public function index()
    {

        $data['exams'] = Exam::orderby('id', 'DESC')->paginate(10);
        $data['skills'] = Skill::select('id', 'name')->get();
        return view('admin.exams.index')->with($data);
    }

    public function show(Exam $exam)
    {

        $data['exam'] = $exam;
        return view('admin.exams.show')->with($data);
    }



    public function question(Exam $exam)
    {

        $data['exam'] = $exam;
        return view('admin.exams.questions')->with($data);
    }



    public function create()
    {

        $data['skills'] = Skill::select('id', 'name')->get();
        return view('admin.exams.create')->with($data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'img' => 'required|image|max:2048',
            'skill_id' => 'required|exists:skills,id',
            'question_no' => 'required|integer|min:1',
            'difficulty' => 'required|integer|min:1|max:5',
            'duration_mins' => 'required|integer|min:1',
        ]);

        $imgPath = Storage::putFile('exams', $request->file('img'));

        $exam = Exam::create([

            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),

            'img' => $imgPath,
            'skill_id' => $request->skill_id,
            'question_no' => $request->question_no,
            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration_mins,
            'active' => 0,
        ]);

        return redirect(url("dashbord/exams/create-questions/{$exam->id}"));
    }

    public function createquestions(Exam $exam)
    {

        $data['exam_id'] = $exam->id;
        $data['question_no'] = $exam->question_no;

        return view('admin.exams.create-question')->with($data);
    }

    public function storequestions(Exam $exam, Request $request)
    {

        $request->validate([
            'titels' => 'required|array',
            'titels.*' => 'required|string|max:500',
            'right_anss' => 'required|array',
            'right_anss.*' => 'required|in:1,2,3,4',
            'option_1s' => 'required|array',
            'option_1s.*' => 'required|string|max:255',
            'option_2s' => 'required|array',
            'option_2s.*' => 'required|string|max:255',
            'option_3s' => 'required|array',
            'option_3s.*' => 'required|string|max:255',
            'option_4s' => 'required|array',
            'option_4s.*' => 'required|string|max:255',

        ]);


        for ($i = 0; $i < $exam->question_no; $i++) {

            Question::create([

                'exam_id' => $exam->id,
                'titel' => $request->titels[$i],
                'option_1' => $request->option_1s[$i],
                'option_2' => $request->option_2s[$i],
                'option_3' => $request->option_3s[$i],
                'option_4' => $request->option_4s[$i],
                'right_ans' => $request->right_anss[$i],

            ]);
        }
        $exam->update([
            'active' => 1
        ]);
        event(new examAddEvent);
        return redirect(url('dashbord/exams'));
    }
}
