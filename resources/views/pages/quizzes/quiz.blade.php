@extends('layouts.layouts')
@section('content')
  
<div class="wrapper bg-white rounded">
  <form action=""  >
  <div class="content">
      <a href="#"><span class="fa fa-angle-left pr-2"></span>Back</a>
      

    </div>
    <input type="button" onclick="getQuestion(event)" data-quiz="{{ $quiz_id }}" value="Start" class="mx-sm-0 mx-1">
  </form>
  </div>
  <script>
    var data =null
        function getQuestion(e){
          var id = $('input[type=button]').attr('data-quiz')
            $.ajax({
                url: `/quizzes/quiz/${id}`,
                type: 'GET',
                success: function (data) {
                  
                  
                    
                }
            });
          }
          function nextQuestion(data){

          }
  
    </script>
  @endsection