<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Vocabulaire;
use Illuminate\Http\Request;

class VocabulaireController extends Controller
{
    public function index()  {
        $vocabulaires=Vocabulaire::query()
        ->where('user',auth()->user()->id)
        ->paginate(10);
        return view('pages.vocabulaires.index',compact('vocabulaires'));
    } 
    public function create()  {
        return view('pages.vocabulaires.create');
    }  
    public function store(Request $r)  {
        $validate=$r->validate([
            'word'=>'required|string|max:50',
            'definition'=>'required|string',
            'language'=>'required|in:1,2,3',
        ]);

        $vacabulaires= Vocabulaire::query()
        ->where('user',auth()->user()->id)
        ->latest('quiz')->first();
        
        if($vacabulaires){
            $quiz_id = $vacabulaires->quiz ;
            $number_words=Vocabulaire::where('quiz',$quiz_id)
            ->where('user',auth()->user()->id)->count();

            // dd($number_words);
            if($number_words>10){
                $quiz_id= Quiz::create([
                    'title'=>'quiz number '.$vacabulaires->quiz +2,
                    'score_max'=>0,
                    'last_score'=>0,
                    'language'=>$validate['language'],
                    ])->id;
                    unset($validate['language']);
                    
                }
        }else{
            $quiz_id= Quiz::create([
                'title'=>'quiz number 1 of user : '.auth()->user()->first_name,
                'score_max'=>0,
                'last_score'=>0,
                'language'=>$validate['language'],
                ])->id;

        }
        $validate['quiz']=$quiz_id;
        $validate['user']=auth()->user()->id;
        // dd($validate);
        $vocabulaire=Vocabulaire::create($validate);
        return redirect( route('vocabulaire.index'));
    }
}
