<?php

namespace App\Http\Controllers;

use App\Exports\AnswersExport;
use App\Models\Answer;
use App\Models\Question;
use App\Models\AnswerRecord;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Rules\ValidAnswerRecord;
use Maatwebsite\Excel\Facades\Excel;

class AnswerRecordController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $question_id = AnswerRecord::FindOrFail($id)->question_id;
        $data['question'] = Question::FindOrFail($question_id)->question;
        $data['Record'] = AnswerRecord::FindOrFail($id)->Answers;
        return view('AnswersRecord.Answers_index')->with('data', $data);
    }
    public function print($id)
    {
        session()->flash('id', $id);
        return Excel::download(new AnswersExport, 'test.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnswerRecord  $answerRecord
     * @return \Illuminate\Http\Response
     */
    public function show(AnswerRecord $answerRecord)
    {
        $data['records'] = AnswerRecord::join('questions', 'questions.id', '=', 'answer_records.question_id')
            ->selectRaw('questions.question')
            ->selectRaw('answer_records.id')
            ->selectRaw('answer_records.date')
            ->selectRaw('answer_records.created_at')
            ->get();
        return view('AnswersRecord.index')->with('data', $data);
    }

    public function destroy(AnswerRecord $answerRecord)
    {
        //
    }
}
