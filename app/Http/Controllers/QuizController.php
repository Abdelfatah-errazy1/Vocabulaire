<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Vocabulaire;
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
        ->where('vocabulaires.user', auth()->user()->id)
        ->where('quizzes.language', request('language'))
        ->select('quizzes.id')
        ->groupBy('quizzes.id')
        ->havingRaw('COUNT(quizzes.id) >= 2')        
        ->get();

        foreach($quizzes_id as $index=>$value){
            $ids[$index]=$value->id;
        }

        $quiz_id = $quizzes_id[array_rand($ids)]->id;
        $quiz=Quiz::query()->where('quizzes.id','=',$quiz_id)->first();
        // dd($quiz);
        return view('pages.quizzes.quiz',['quiz_id'=>$quiz['id']]);
    }
    public function resultat(){
        return view('pages.quizzes.resultat');
    }
    public function getQuestion($id){
        $quiz=Vocabulaire::query()->where('quiz',$id)->where('user',auth()->user()->id)->get();
        // dd($quiz);
        return response()->json($quiz);
    }
}
