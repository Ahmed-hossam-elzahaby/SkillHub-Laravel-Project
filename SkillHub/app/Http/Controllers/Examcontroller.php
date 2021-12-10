<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Examcontroller extends Controller
{
    public function show($id)
    {
        $data['exam'] = Exam::findorfail($id);
        $user = Auth::user();
        $data['canEnterExam'] = true;

        if ($user !== null) {
            $userPivot = $user->exams()->where('exam_id', $id)->first();
            if ($userPivot !== null and $userPivot->pivot->status == 'closed') {

                $data['canEnterExam'] = false;
            }
        }



        return view('web.exams.show')->with($data);
    }

    public function start($examid, Request $request)
    {
        $user = Auth::user();
        $user->exams()->attach($examid);
        $request->session()->flash('prev', "start/$examid");
        return redirect(url("exams/questions/$examid"));
    }

    public function Question($examid,Request $request)
    {
        if (session('prev') !== "start/$examid") {

            return redirect(url("exams/show/$examid"));
        }
        $data['exam'] = Exam::findorfail($examid);
        $request->session()->flash('prev', "question/$examid");
        
        return view('web.exams.questions')->with($data);
    }

    public function submit($examid, Request $request)
    {
        if (session('prev') !== "question/$examid") {

            return redirect(url("exams/show/$examid"));
        }

        $request->validate([

            'answers' => 'required|array',
            'answers.*' => 'required|in:1,2,3,4',

        ]);
        // calc score
        $points = 0;
        $exam = Exam::findorfail($examid);
        $totalExamQuestion = $exam->questions->count();

        foreach ($exam->questions as $question) {

            if (isset($request->answers[$question->id])) {
                $userans = $request->answers[$question->id];
                $rightans = $question->right_ans;
            }

            if ($userans == $rightans) {
                $points += 1;
            }
        }
        //         /calc score

        $score = ($points / $totalExamQuestion) * 100;


        // calc time 
        $user = Auth::user();
        $pivotRow = $user->exams()->where('exam_id', $examid)->first();
        $starttime = $pivotRow->pivot->created_at;
        $submittime = Carbon::now();
        $timemins = $submittime->diffInMinutes($starttime);

        if ($timemins > $pivotRow->duration_mins) {

            $score = 0;
        }



        $user->exams()->updateExistingPivot($examid, [

            'score' => $score,
            'time_mins' => $timemins,

        ]);
        $request->session()->flash('sucess', "your finish exam success with score: $score%");
        return redirect(url("exams/show/$examid"));
    }
}
