@extends('layout')
@section('content')
<style>
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
    <table>
        <thead>
            <tr>
                <th>Student Diary</th>
                <th>Homework</th>
                <th>Absence</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gradues as $gradue)
            <tr>
                <td>{{ $gradue->student_dairy }}</td>
                <td>{{ $gradue->homework }}</td>
                <td>{{ $gradue->absence }}</td>
                <td>{{ $gradue->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Student Diary</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->student_dairy }}</td>
                <td>{{ $project->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
