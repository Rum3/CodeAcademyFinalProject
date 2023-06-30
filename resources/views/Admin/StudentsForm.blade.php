@extends('layout')
@section('content')
<div class="max-w-2xl mx-auto p-6 bg-gray-200">
      @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <h1 class="text-lg font-bold mb-4">Add/Edit student</h1>
      <form action="{{ isset($student) ?  route('student.update', ['student' => $student])  : route('student.store') }}" method="post">
        @csrf
        @if(isset($student))
            @method('put')
        @endif

        <input type="text" id="student_name" name="first_name" placeholder="Name" value="{{ isset($student) ? $student->first_name : '' }}" required class="w-1/2,1 py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="text" id="student_lastname" name="last_name" placeholder="Фамилия" value="{{ isset($student) ? $student->last_name : '' }}" required class="w-1/2 py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="email" id="email" name="email" placeholder="Email" value="{{ isset($student) ? $student->email : '' }}" required class="w-full py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="tel" id="phone" value="{{ isset($student) ? $student->phone : '' }}" name="phone" placeholder="Телефон" required class="w-full py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="text" id="country" name="country" value="{{ isset($student) ? $student->country : '' }}" placeholder="Държава" required class="w-1/2,1 py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="text" id="city" name="city" value="{{ isset($student) ? $student->city : '' }}" placeholder="Град" required class="w-1/2 py-2 px-4 mb-4 rounded border border-gray-300">

        <select id="trainings" name="selectedTrainings[]" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" required>
            <option value="Select Training" selected>Select Training</option>
            @foreach ($trainings as $training)
              <option value="{{ $training->id }}">
                {{ $training->title }}
              </option>
            @endforeach
          </select>

          <button type="button" onclick="addTraining()" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white">+</button>
          <ul id="trainingList">
            @if(isset($student))
            @foreach ($student->trainings as $training)
            <li class="bg-gray-100 p-2 mb-2 rounded flex items-center" data-training-id="{{ $training->id }}">
              {{ $training->title }}
              <button type="button" class="delete-button ml-auto w-1/8 py-2 px-4 rounded border border-gray-300 bg-red-500 text-white">X</button>
            </li>
            @endforeach
            @endif
          </ul>

        <input type="hidden" id="selectedTrainings" name="selectedTrainings" value="{{ isset($student) ? implode(',', $student->trainings->pluck('id')->toArray()) : '' }}">

        <textarea id="information" name="information"  rows="4" cols="50" required class="w-full py-2 px-4 mb-4 rounded border border-gray-300" placeholder="Кратка информация">{{ isset($student) ? $student->information : '' }}</textarea>
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">SAVE</button>
        </div>
    </form>

    

    <script src="https://unpkg.com/vue@2.6.14/dist/vue.js"></script>
    <script>
function addLanguageScore() {
  var languageInput = document.getElementById('language');
  var scoreInput = document.getElementById('languageScore');
  var language = languageInput.value;
  var score = scoreInput.value;

  if (language !== '' && score !== '') {
    var listItem = document.createElement('li');
    listItem.classList.add('mb-4', 'flex', 'justify-between', 'border-black-500');

    var languageContent = document.createElement('div');
    languageContent.classList.add('flex', 'flex-col');

    var languageElement = document.createElement('h2');
    languageElement.textContent = language;
    languageElement.classList.add('text-xl', 'font-bold', 'mb-2', 'text-gray-800');
    languageContent.appendChild(languageElement);

    var scoreElement = document.createElement('p');
    scoreElement.textContent = score;
    scoreElement.classList.add('mb-4', 'text-gray-600');
    languageContent.appendChild(scoreElement);

    listItem.appendChild(languageContent);

    var deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.classList.add('py-2', 'px-4', 'max-h-10', 'rounded', 'border', 'border-gray-300', 'bg-red-500', 'text-white');
    deleteButton.addEventListener('click', function() {
      listItem.remove();
    });

    listItem.appendChild(deleteButton);

    var languageList = document.getElementById('languageScoreList');
    languageList.appendChild(listItem);

    languageInput.value = '';
    scoreInput.value = '';

    // Hide fields by adding hidden inputs
    var hiddenLanguageInput = document.createElement('input');
    hiddenLanguageInput.type = 'hidden';
    hiddenLanguageInput.name = 'language[]';
    hiddenLanguageInput.value = language;
    listItem.appendChild(hiddenLanguageInput);

    var hiddenScoreInput = document.createElement('input');
    hiddenScoreInput.type = 'hidden';
    hiddenScoreInput.name = 'score[]';
    hiddenScoreInput.value = score;
    listItem.appendChild(hiddenScoreInput);
  }
}

      new Vue({
  el: "#app",
  data: {
    showForm: false
  },
  methods: {
    toggleForm() {
      this.showForm = !this.showForm;
    }
  }
});
    </script>
<script src="{{ asset('js/app.js') }}"></script>
  </div>
  @endsection
