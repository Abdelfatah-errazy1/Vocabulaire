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
    // Use modern JavaScript features like 'const' and 'let' for variable declaration
    let data = null;
    let question = 0;
    let score = 0;

    function getQuestion(e) {
      if (!data) {
        const id = $('input[type=button]').attr('data-quiz');
        $.ajax({
          url: `/quizzes/quiz/${id}`,
          type: 'GET',
          success: function (res) {
            data = res;
            nextQuestion();
          }
        });
      } else {
        nextQuestion();
      }
    }

    function displayQuestion(q) {
  const questionData = data[q];
  const fakeAnswers = getRandomIndicesExcept(data, q);
  const correctAnswerIndex = Math.floor(Math.random() * (fakeAnswers.length + 1));
  fakeAnswers.splice(correctAnswerIndex, 0, q); // Insert correct answer index

  const content = document.getElementById('content');

  content.innerHTML = `
    <a href="#"><span class="fa fa-angle-left pr-2"></span>Back</a>
    <p class="text-muted">
      qu'est-ce que ce mot signifie :
      <strong>${questionData['word']}</strong>
    </p>
    <div class="options py-3">
      ${fakeAnswers.map((element, index) => `
        <div class="options py-3">
          <label class="rounded p-2 option">
            ${data[element]['definition']}
            <input type="radio" name="radio" value="${index}">
            <span class="crossmark"></span>
          </label>
        </div>
      `).join('')}
    </div>
  `;
}

    function nextQuestion() {
      if (data[question]) {
        displayQuestion(question);
        question++;
        score++;
      } else {
        // All questions have been displayed, handle end of quiz
        showResults();
      }
    }

    function showResults() {
      const content = document.getElementById('content');
      content.innerHTML = `
        <p>Congratulations! You have completed the quiz.</p>
        <p>Your score is: ${score}/${data.length}</p>
        <button onclick="restartQuiz()">Restart Quiz</button>
      `;
    }

    function restartQuiz() {
      question = 0;
      score = 0;
      getQuestion();
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