@extends('layout')
@section('content')
<div class="max-w-2xl mx-auto p-6 bg-gray-200">
    <!-- add_editUsers.blade.php -->
      @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <h1 class="text-lg font-bold mb-4">Add/Edit student</h1>
      <form action="{{ isset($student) ? route('student.update', $student) : route('student.store') }}" method="post">
          @csrf
          @if(isset($student))
              @method('put')
          @endif
          <input type="text" id="student_name" name="student_name" placeholder="Name" value="{{ isset($student) ? $student->student_name : '' }}" required class="w-1/2,1 py-2 px-4 mb-4 rounded border border-gray-300">
          <input type="text" id="student_lastname" name="student_lastname" placeholder="Фамилия" value="{{ isset($student) ? $student->student_lastname : '' }}" required class="w-1/2 py-2 px-4 mb-4 rounded border border-gray-300">
          <input type="email" id="email" name="email" placeholder="Email" value="{{ isset($student) ? $student->email : '' }}" required class="w-full py-2 px-4 mb-4 rounded border border-gray-300">
          <input type="tel" id="phone" value="{{ isset($student) ? $student->phone : '' }}" name="phone" placeholder="Телефон" required class="w-full py-2 px-4 mb-4 rounded border border-gray-300">
          <input type="text" id="country" name="country" value="{{ isset($student) ? $student->country : '' }}" placeholder="Държава" required class="w-1/2,1 py-2 px-4 mb-4 rounded border border-gray-300">
          <input type="text" id="city" name="city" value="{{ isset($student) ? $student->city : '' }}" placeholder="Град" required class="w-1/2 py-2 px-4 mb-4 rounded border border-gray-300">
          <input type="text" id="language" name="language" value="{{ isset($student) ? $student->language : '' }}" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" placeholder="Език" required>
          <input type="text" id="languageScore" name="languageScore" value="{{ isset($student) ? $student->languageScore : '' }}" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" placeholder="languageScore" required>
          <button type="button" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white">+</button>
          <input type="text" id="repository" name="repository" value="{{ isset($student) ? $student->repository : '' }}" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" placeholder="Repository" required>
          <button type="button" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white">+</button>
          <textarea id="information" name="information" value="{{ isset($student) ? $student->information : '' }}" rows="4" cols="50" required class="w-full py-2 px-4 mb-4 rounded border border-gray-300" placeholder="Кратка информация"></textarea>
          <div class="flex justify-end">
    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">SAVE</button>
  </div>
      </form>
      <div id="app">
      <h1 class="text-lg font-bold cursor-pointer" @click="toggleForm">users details</h1>
      <form :class="{ hidden: !showForm }" action="">
        <input type="text" value="URL" class="w-full py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="text" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" value="web page name">
        <button type="button" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white ml-auto">+</button>
        <input type="text" value="messenger name" class="w-full py-2 px-4 mb-4 rounded border border-gray-300">
        <input type="text" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" value="username">
        <button type="button" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white">+</button>
        <input type="text" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" value="hobby">
        <button type="button" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white">+</button>
        <input type="text" class="w-4/5 py-2 px-4 mb-4 rounded border border-gray-300" value="skills">
        <button type="button" class="w-1/8 py-2 px-4 mb-4 rounded border border-gray-300 bg-green-500 text-white">+</button>
        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">SAVE</button>
      </form>
    </div>
    <script src="https://unpkg.com/vue@2.6.14/dist/vue.js"></script>
    <script>
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
