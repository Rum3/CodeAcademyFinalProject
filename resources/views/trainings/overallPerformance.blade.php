@extends('layout')
@section('content')
<style>
.resume-popup {
    position: absolute;
    z-index: 10;
    top: 100%;
    left: 0;
    display: none;
    background-color: white;
    width: 400px; /* Настройте ширината според вашите нужди */
    height: 200px; /* Настройте височината според вашите нужди */
    padding: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

input[type="checkbox"]:checked ~ .resume-popup {
    display: block;
}
.grades {
    font-family: Arial, sans-serif;
}

.grades h1 {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 1rem;
}

.grades table {
    margin-top: 0.5rem;
    width: 80%;
    border-collapse: collapse;
    border: 1px solid black;
    margin-left: 10%;
    margin-right: 10%;
}

.grades th,
.grades td {
    padding: 0.5rem;
    border: 1px solid black;
}

.grades th {
    background-color: #f2f2f2;
}

.grades tbody tr:nth-child(even) {
    background-color: #f2f2f2;
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

<div class="grades">
<table id="student1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Activity</th>
            <th>Overall Performance</th>
            <th>OOP</th>
            <th>Final Score</th>
            <th>Languages</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        @if($student->id === 1)
        <tr>
            <td class="relative">
                <label for="resume-toggle-{{ $student->id }}">
                    {{ $student->name }}
                </label>
                <input type="checkbox" id="resume-toggle-{{ $student->id }}" class="hidden" />
                <div class="resume-popup">
                    <p>{{ $student->resume }}</p>
                    <a href="{{ $student->resumeLink }}" class="absolute top-0 right-0 m-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 00-1 1v3H4a1 1 0 00-1 1v10a1 1 0 001 1h12a1 1 0 001-1V7a1 1 0 00-1-1h-2V3a1 1 0 00-1-1H7zm5 2H8v1a1 1 0 001 1h3v9H4V7h3a1 1 0 001-1V4h4v1a1 1 0 001 1h1v1zm-2 5H8v5h2v-5zm4 0h-1v5h1v-5z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </td>
            <td>{{ $student->activity }}</td>
            <td>{{ $student->overall_performance }}</td>
            <td>{{ $student->oop }}</td>
            <td>{{ $student->final_score }}</td>
            <td>{{ $student->languages }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>
@endsection
