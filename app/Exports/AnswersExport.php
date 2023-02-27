<?php

namespace App\Exports;

use App\Models\Answer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnswersExport implements FromView
{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data['answers']=Answer::where('answer_rec_id','=',session()->get('id'))->get();
        return view('table')->with($data);
    }
}
