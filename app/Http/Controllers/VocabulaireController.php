<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Vocabulaire;
use Illuminate\Http\Request;

class VocabulaireController extends Controller
{
    public function index()  {
        $vocabulaires=Vocabulaire::query()->paginate(10);
        return view('index',compact('vocabulaires'));
    } 
    public function create()  {
        return view('create');
    }  
    public function store(Request $r)  {
        $validate=$r->validate([
            'word'=>'required|string|max:50',
            'definition'=>'required|string',
            'language'=>'required|in:1,2,3',
        ]);
        $quiz_id= Quiz::query()->latest('id')->first()->id;

        $number_words=Vocabulaire::where('quiz',$quiz_id)->count();

        // dd($number_words);
        if($number_words>10){
           $quiz_id= Quiz::create([
                'title'=>'quiz number '.$quiz_id+2,
                'score_max'=>0,
                'last_score'=>0,
                'language'=>$validate['language'],
            ])->id;
            unset($validate['language']);

        }
        $validate['quiz']=$quiz_id;
        // dd($quiz_id);
        $vocabulaire=Vocabulaire::create($validate);
        return redirect( route('vocabulaire.index'));
    }
}
