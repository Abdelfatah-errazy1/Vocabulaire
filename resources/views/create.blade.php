@extends('layouts.layouts')
@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('vocabulaire.index') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">add new Vocabulaire</li>
        </ol>
    </nav>
    <form action="{{ route('vocabulaire.store') }}" method="POST">
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
</section>
@endsection