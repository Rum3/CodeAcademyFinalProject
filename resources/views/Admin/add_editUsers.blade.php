<style>
    /* General styles */
body {
  font-family: Arial, sans-serif;
}

h1 {
  color: #333;
  font-size: 24px;
  margin-bottom: 10px;
}


input,
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

button{
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 80%;
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

a {
  color: #333;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

div .plus + .plusZ {
  display: inline-block;
  margin-left: 5px;
}
div .plusZ {
    max-width: 5%;
}
#student_name , #student_lastname ,#country ,#city{
        display: inline-block;
        width: calc(50% - 5px);
        margin-right: 10px;
        max-width: 30%;
    }
div .plus {
    max-width: 90%;
}

</style>
<div>
  <!-- add_editUsers.blade.php -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Add/Edit users</h1>

    <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="post">
        @csrf

        @if(isset($user))
            @method('put')
        @endif

    <input type="text" id="student_name" name="student_name" value="{{ isset($user) ? $user->student_name : '' }}" required>
    <input type="text" id="student_lastname" name="student_lastname" value="Фамилия" required>

    <input type="email" id="email" name="email" value="Email" required>
    <input type="tel" id="phone" name="phone" value="Телефон" required><br><br>

    <input type="text" id="country" name="country" value="Държава" required>
    <input type="text" id="city" name="city" value="Град" required>

    <input type="text" id="language" name="language" class="plus" value="Език" required><button type="button" class="plusZ">+</button><br><br>

    <input type="text" id="repository" name="repository" class="plus" value="Repository" required><button type="button" class="plusZ">+</button><br><br>

    <textarea id="information" name="information" value="Кратка информация" rows="4" cols="50" required></textarea><br><br>

    <button type="submit">SAVE</button><br><br>

    <h1>users details</h1>
    <input type="text" value="URL"> 
    <input type="text"  class="plus" value="web page name"><button type="button" class="plusZ">+</button><br><br>

    <input type="text" value="massenger name">
    <input type="text" class="plus" value="username"><button type="button" class="plusZ">+</button><br><br>

    <input type="text" class="plus" value="hobby"><button type="button" class="plusZ">+</button><br><br>

    <input type="text" class="plus" value="skills"><button type="button" class="plusZ">+</button><br>
    <button type="submit">SAVE</button>
    </form>
</div>
