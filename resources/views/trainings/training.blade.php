@extends('layout')
@section('content')
<div class="trainings">
<style>
    .lecture {
        margin-left: 10%;
        color: grey;
    }

    .lecture h1 {
        font-size: 200%;
        color: black;
    }

    

    .task-list-item input[type="checkbox"]:checked ~ .task-title {
        color: black;
    }

    .stNav {
    display: flex;
    align-items: center;
    margin-left: 10%;
    font-size: 140%;
}

.stNav a , .stNav p {
    margin-right: 0.5rem;
}

</style>

<div class="stNav">
    <a href="{{ route('overallPerformance') }}" >Overall Performance</a><p>|</p>
    <a href="{{ route('grades') }}">Grades</a><p>|</p>
    <a href="{{ route('training') }}" >Trainings</a>
</div>

<div class="lecture">
<h1>PHP OOP</h1>
<ul class="task-list">
    @foreach ($tasks as $task)
        <li class="task-list-item ">
            <input type="checkbox" class="task-checkbox hidden" id="{{ $task['id'] }}" />
            <label for="{{ $task['id'] }}" class="task-title flex items-center cursor-pointer text-xl font-semibold uppercase" @click="{{ $task['id'] }}.checked = !{{ $task['id'] }}.checked">
            {{ $task['lecture'] }}: {{ $task['title'] }}
            </label>
        </li>
    @endforeach
</ul>
</div>



@endsection
