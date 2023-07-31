<?php

namespace App\Http\Controllers;

use App\Models\Vocabulaire;
use Illuminate\Http\Request;

class VocabulaireController extends Controller
{
    public function index()  {
        $vocabulaires=Vocabulaire::all();
        return view('index',compact('vocabulaires'));
    } 
    public function create()  {
        return view('create');
    }  
    public function store(Request $r)  {
        $validate=$r->validate([
            'word'=>'required|string|max:50',
            'definition'=>'required|string',
        ]);
        Vocabulaire::create($validate);
        return redirect( route('vocabulaire.index'));
    }
}
