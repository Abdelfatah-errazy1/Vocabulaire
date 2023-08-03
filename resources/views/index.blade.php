@extends('layouts.layouts')
@section('content')
{{-- @dd(Auth::check()) --}}
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('vocabulaire.index') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Liste Vocabulaires</li>
    </ol>
</nav>
  <a href="{{ route('vocabulaire.create') }}" class="btn btn-primary my-2">nouvelle word</a>
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
<div class="d-flex justify-content-center my-4">
  <nav aria-label="Page navigation example">
      <ul class="pagination">
          <!-- Previous Page Link -->
          @if ($vocabulaires->onFirstPage())
              <li class="page-item disabled">
                  <span class="page-link">&laquo;</span>
              </li>
          @else
              <li class="page-item">
                  <a class="page-link" href="{{ $vocabulaires->previousPageUrl() }}" rel="prev">&laquo;</a>
              </li>
          @endif
  
          <!-- Current Page  Link -->
          <li class="page-item active">
              <span class="page-link">{{ $vocabulaires->currentPage() }}</span>
          </li>
  
          <!-- Next Page Link -->
          @if ($vocabulaires->hasMorePages())
              <li class="page-item">
                  <a class="page-link" href="{{ $vocabulaires->nextPageUrl() }}" rel="next">&raquo;</a>
              </li>
          @else
              <li class="page-item disabled">
                  <span class="page-link">&raquo;</span>
              </li>
          @endif
      </ul>
  </nav>
</div>
</div>
@endsection