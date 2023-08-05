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
        // $quizzes_id=Quiz::has('vocabulaires', '>=', 2);
        // Get a random key/index from the array
        foreach($quizzes_id as $index=>$value){
            $ids[$index]=$value->id;
        }
        $randomKey = array_rand($ids);
        $quiz_id = $quizzes_id[$randomKey]->id;
        $quiz=Quiz::query()->where('quizzes.id','=',$quiz_id)->with('vocabulaires')->get();
        // dd($quiz);
        return view('pages.quizzes.exemple',compact('quiz'));
    }
}
