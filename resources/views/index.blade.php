@extends('layouts.layouts')
@section('content')

<div class="container">
  <a href="{{ route('vocabulaire.create') }}" class="btn btn-primary mb-2">nouvelle word</a>
  <table class="table  table-striped table-hover border ">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">word</th>
      <th scope="col">definition</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($vocabulaires as $v )
    <tr>
      <th scope="row">{{ $v->id }}</th>
      <td>{{ $v->word }}</td>
      <td>{{ $v->definition }}</td>
      <td><a href="" class="btn btn-warning">show</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection