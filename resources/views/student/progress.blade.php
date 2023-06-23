@extends('layout')
@section('content')

<link rel="stylesheet" href="{{ asset('css/popup.css') }}">
@if (Auth::user()->role == 'employer')
<div class="info flex justify-center items-center">
    <h1 class="text-center">Training name</h1>
</div>
@else
@include('student.layout')
@endif

​
<br><br>
​
<div class="mt-4 mx-10 w-3/4  rounded-lg border" >
    <table id="student1"  class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Name</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Activity</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Overall Performance</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">OOP</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Final Score</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Languages</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach($students as $student)
            @if($student->id === 1)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 relative">
                    <label for="resume-toggle-{{ $student->id }}">
                        {{ $student->student_name }}
                    </label>
                    <input type="checkbox" id="resume-toggle-{{ $student->id }}" class="hidden" />
                    <div class="resume-popup bg-white w-64 h-32 absolute top-full left-0 hidden border border-gray-200 p-4 shadow">
                        <p>{{ $student->resume }}</p>
                        <a href="{{ $student->resumeLink }}" class="absolute top-0 right-0 mt-2 mr-2 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7 2a1 1 0 00-1 1v3H4a1 1 0 00-1 1v10a1 1 0 001 1h12a1 1 0 001-1V7a1 1 0 00-1-1h-2V3a1 1 0 00-1-1H7zm5 2H8v1a1 1 0 001 1h3v9H4V7h3a1 1 0 001-1V4h4v1a1 1 0 001 1h1v1zm-2 5H8v5h2v-5zm4 0h-1v5h1v-5z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4">{{ $student->activity }}</td>
                <td class="px-6 py-4">{{ $student->overall_performance }}</td>
                <td class="px-6 py-4">{{ $student->oop }}</td>
                <td class="px-6 py-4">{{ $student->final_score }}</td>
                <td class="px-6 py-4">{{ $student->languages }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
​
@endsection
