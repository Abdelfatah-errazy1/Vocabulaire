@extends('layouts.layouts')

@section('content')
    <div class="container">
      <form action="{{ route('quizzes.get') }}" method="get">
        <div class="options py-3">
          <label class="rounded p-2 option">
              language : english
              <input type="radio"  name="language" value="1">
              <span class="checkmark"></span>
          </label>
          <label class="rounded p-2 option">
              langue :francais
              <input type="radio"  name="language" value="2">
              <span class="checkmark"></span>
          </label>
          <label class="rounded p-2 option">
             langue : arabe
              <input type="radio"  name="language" value="3">
              <span class="checkmark"></span>
          </label>
        </div>
        <input type="submit" value="Next" class="mx-sm-0 mx-1">
      </form>
    </div>
@endsection