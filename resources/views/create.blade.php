@extends('layouts.layouts')
@section('content')
  <div class="container">
    <form action="{{ route('store.Vocabulaire') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label  class="form-label">word</label>
        <input type="text" class="form-control" name="word" placeholder="word....">
      </div>
      <div class="mb-3">
        <label  class="form-label">Definition</label>
        <textarea class="form-control" name="definition" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary" type="submit" >ajouter</button>
      </div>

    </form>
  </div>
@endsection