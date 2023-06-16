@extends('layout')
@section('content')
<style>
    /* General styles */
/* body {
  font-family: Arial, sans-serif;
} */

h1 {
  color: #333;
  font-size: 24px;
  margin-bottom: 10px;
}

label {
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

textarea {
  height: 100px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

/* Form specific styles */
div {
  max-width: 40%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
}

#title {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 20px;
}

#homework {
  margin-top: 20px;
}

.upload {
  color: #333;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

#estimate + p {
  display: inline-block;
  margin-left: 5px;
}

</style>
<!-- create.blade.php -->
<div>
<h1>Add/Edit training synopsis</h1>
<form method="POST">
    @csrf
    <input type="text" id="title" name="title" placeholder="Training Title" required><br>
    <textarea id="training_description" name="training_description" placeholder="Description" required></textarea><br><br>

    <label for="module_title"><livewire:dynamic-form/></label><br>
    <input type="text" id="module_title" name="module_title" placeholder="Module Title" required><br>
    <textarea id="module_description" name="module_description" placeholder="Description" required></textarea><br><br>


    <label for="lecture_title">ADD Lecture:</label><br>
    <input type="text" id="lecture_title" name="lecture_title" placeholder="title" required><br>
    <textarea id="lecture_description" name="lecture_description" placeholder="description" required></textarea><br><br>

    <h1>Schedule</h1><br>
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" required>

    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" required><br><br>

    <label for="estimate">Estimate</label>
    <input type="number" name="estimate" id="estimate"> <p>hours</p>

    <h1>Add homework</h1>
    <input type="text" id="homework" placeholder="homework description"><br>

    <a class="upload" href="">качи файл</a><br>

    <button type="submit">SAVE</button>
</form>
</div>
@livewireStyles
@livewireScripts
@endsection



