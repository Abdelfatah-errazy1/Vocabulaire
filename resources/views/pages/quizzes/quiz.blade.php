@extends('layouts.layouts')
@section('content')
  
<div class="wrapper bg-white rounded">
  <form action=""  onsubmit="getQuestion(e)">
  <div class="content">
      <a href="#"><span class="fa fa-angle-left pr-2"></span>Back</a>
      <p class="text-muted">Multiple Choice Question</p>
      <p class="text-justify h5 pb-2 font-weight-bold">What did mean ugly?</p>

        <div class="options py-3">
          <label class="rounded p-2 option">
            His boxing gloves
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
            <label class="rounded p-2 option">
              A parachute
              <input type="radio" name="radio">
              <span class="checkmark"></span>
            </label>
            <label class="rounded p-2 option">
              Nothing
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
            <label class="rounded p-2 option">
              A world little belt
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
      </div>

    </div>
    <input type="submit"  value="Start" class="mx-sm-0 mx-1">
  </form>
  </div>
  <script>
    function getQuestion(e){
      e.preventDefault();
      console.log(data);
      fetch('http://localhost/quizzes/quiz/1')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        console.log(response);
        return response.json(); // Parse response body as JSON
    })
    .then(data => {
        // Process the data
        console.log(data);
    })
    .catch(error => {
        // Handle errors
        console.error('Fetch error:', error);
    });

  }
    </script>
  @endsection