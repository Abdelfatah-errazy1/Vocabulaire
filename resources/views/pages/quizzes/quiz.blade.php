@extends('layouts.layouts')
@section('content')
  
<div class="wrapper bg-white rounded">
  <form action=""  >
  <div class="content" id="content">
      <a href="#"><span class="fa fa-angle-left pr-2"></span>Back</a>
      <p class="text-muted">Multiple Choice Question</p>
      <div class="options py-3">
        <div class="options py-3">
          <label class="rounded p-2 option">
            answer 1
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
        </div>
      </div>
    </div>
    <input type="button" onclick="getQuestion(event)" data-quiz="{{ $quiz_id }}" value="Start" class="mx-sm-0 mx-1">
  </form>
  </div>
  <script>
    var data =null
    var quesion=0
    var score=0
        function getQuestion(e){
          if(!data){
            var id = $('input[type=button]').attr('data-quiz')
            $.ajax({
                url: `/quizzes/quiz/${id}`,
                type: 'GET',
                success: function (res) {
                  data=res
                  nextQuestion(quesion)
                    
                }
              });
            }else{
              nextQuestion(quesion)
            }
          }
          
          function nextQuestion(id){
            if(data[quesion]){
              var fakeAnswers=getRandomIndicesExcept(data,quesion)
              const positionQuestion = Math.floor(Math.random() * 4);
              console.log("fake",fakeAnswers);
              var content=document.getElementById('content')
              content.innerHTML = `
                <a href="#"><span class="fa fa-angle-left pr-2"></span>Back</a>
                <p class="text-muted">
                  qu'est-ce que ce mot signifie :
                  <strong>${data[quesion]['definition']}</strong>
                </p>
                <div class="options py-3">
                  ${fakeAnswers.map(element => `
                    <label class="rounded p-2 option">${data[element]}</label>`
                  ).join('')}
                </div>
                <div class="options py-3">
                  <label class="rounded p-2 option">
                    ${data[quesion]['definition']}
                    <input type="radio" name="radio">
                    <span class="crossmark"></span>
                  </label>
                </div>
              `;

            quesion++
            score++
            
          }else{
            
          }
        }
        function getRandomIndicesExcept(array, excludedIndex) {
          const indices = [];
          while (indices.length < 3) {
            const randomIndex = Math.floor(Math.random() * array.length);
            if (randomIndex !== excludedIndex && !indices.includes(randomIndex)) {
              indices.push(randomIndex);
            }
          }
          return indices;
        }
    </script>
  @endsection