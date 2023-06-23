@extends('layout')
@section('content')

@include('student.layout')

<div class="trainings">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    ​
    <br><br>
    ​
    <div class="lecture ml-10">
            <h1 class="text-4xl">Module_name</h1>
            <ul class="task-list">
                @foreach ($lectures as $lecture)
                    <li class="task-list-item text-gray-500">
                        <input type="checkbox" class="task-checkbox hidden" id="{{ $lecture['id'] }}" />
                        <label for="{{ $lecture['id'] }}" class="task-title flex items-center cursor-pointer text-xl font-semibold uppercase" @click="{{ $lecture['id'] }}.checked = !{{ $lecture['id'] }}.checked">
                            {{ $lecture['id'] }}: {{ $lecture['lecture_name'] }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
