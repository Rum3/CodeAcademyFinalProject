@extends('layout')
@section('content')
@include('student.layout')
<br><br>
​
<div class="relative left-60 w-3/4 overflow-hidden rounded-lg border ">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Student Diary</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Homework</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Absence</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Score</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">student_dairy</td>
                <td class="px-6 py-4">homework</td>
                <td class="px-6 py-4">$gradue->absence</td>
                <td class="px-6 py-4">$gradue->score</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div  class="relative left-60 w-3/4 overflow-hidden rounded-lg border ">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Student Diary</th>
                <th scope="col" class="px-6 py-4 font-large text-gray-900">Score</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr lass="hover:bg-gray-50">
                <td class="px-6 py-4">student_dairy</td>
                <td class="px-6 py-4"">score</td>
            </tr>
        </tbody>
    </table>
</div>
​
@endsection
