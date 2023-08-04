<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    public function getQuiz() {
        $quizzes_id=Quiz::query()
        ->join('vocabulaires', 'quizzes.id', '=', 'vocabulaires.quiz')
        ->select('quizzes.id')
        ->groupBy('quizzes.id')
        ->having('COUNT(vocabulaires.id) ','3')->get();
        // $quizzes_id=Quiz::has('vocabulaires', '>=', 2);
        dd($quizzes_id);
        // Get a random key/index from the array
        $randomKey = array_rand($quizzes_id);

        // Use the random key to access the random number
        $randomNumber = $quizzes_id[$randomKey];
        // $numb
        return view('pages.quizzes.exemple',compact('random'));
    }
}
