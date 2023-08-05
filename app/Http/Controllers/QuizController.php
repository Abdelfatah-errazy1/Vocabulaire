<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    public function language()  {
        return view('pages.quizzes.language');
    }
    public function getQuiz() {
        $quizzes_id=Quiz::query()
        ->join('vocabulaires', 'quizzes.id', '=', 'vocabulaires.quiz')
        ->select('quizzes.id')
        ->groupBy('quizzes.id')
        ->havingRaw('COUNT(quizzes.id) >= 2')        
        ->get();
        foreach($quizzes_id as $index=>$value){
            $ids[$index]=$value->id;
        }
        $quiz_id = $quizzes_id[array_rand($ids)]->id;
        $quiz=Quiz::query()->where('quizzes.id','=',$quiz_id)->with('vocabulaires')->get();
        // dd($quiz);
        return view('pages.quizzes.exemple',compact('quiz'));
    }
    public function resultat(){
        return view('pages.quizzes.resultat');
    }
}
