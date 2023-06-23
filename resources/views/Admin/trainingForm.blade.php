@extends('layout')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="container" class="max-w-2xl mx-auto p-8 bg-gray-100">
    <h1 class="text-xl font-bold mb-4">Add/Edit Training Synopsis</h1>
    <form method="POST" action="{{ route('training.store') }}">
      @csrf
      <input type="text" id="title" name="title" placeholder="Training Title" required class="w-full px-3 py-2 rounded border border-gray-300 mb-4"><br>
      <textarea id="training_description" name="training_description" placeholder="Description" required class="w-full px-3 py-2 rounded border border-gray-300 mb-4"></textarea><br><br>

      <label for="module_title" class="font-bold mb-2 block" id="add_module_title">+ ADD Module</label><br>
      <input type="text" id="module_title" name="module_title[]" placeholder="Module Title" required class="w-full px-3 py-2 rounded border border-gray-300 mb-4"><br>
      <textarea id="module_description" name="module_description[]" placeholder="Description" required class="w-full px-3 py-2 rounded border border-gray-300 mb-4"></textarea><br><br>

      <label for="lecture_title" class="font-bold mb-2 block" id="add_lecture_label">+ ADD Lecture</label><br>
      <input type="text" id="lecture_title" name="lecture_title" placeholder="Title" required class="w-4/5 px-3 py-2 rounded border border-gray-300 mb-4"><br>
      <textarea id="lecture_description" name="lecture_description" placeholder="Description" required class="w-full px-3 py-2 rounded border border-gray-300 mb-4"></textarea><br><br>

      <h1 class="text-xl font-bold mb-4">Schedule</h1><br>
      <label for="start_date" class="font-bold">Start Date:</label>
      <input type="date" name="start_date" id="start_date" required class="px-3 py-2 rounded border border-gray-300 mb-4">

      <label for="end_date" class="font-bold">End Date:</label>
      <input type="date" name="end_date" id="end_date" required class="px-3 py-2 rounded border border-gray-300 mb-4"><br><br>

      <label for="estimate" class="font-bold">Estimate</label>
      <input type="number" name="estimate" id="estimate" class="w-16 px-3 py-2 rounded border border-gray-300 mb-4">
      <p class="inline-block">hours</p>

      <h1 class="text-xl font-bold mb-4" id="add_homework">+Add Homework</h1>
      <input type="text" id="homework" placeholder="Homework Description" class="w-full px-3 py-2 rounded border border-gray-300 mb-4"><br>

      <a class="text-blue-500 hover:underline" href="#">Upload File</a><br>

      <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded float-right">SAVE</button>
    </form>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
@endsection
