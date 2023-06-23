@extends('layout')
@section('content')
<div class="flex justify-center h-screen">
    <div class="p-4 text-center">
        <p class="text-red-500 text-4xl">Are you sure you want to delete {{ $student->student_name }}?</p>
        <form action="{{ route('deleteStudent', $student->id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-8 py-4 bg-red-500 text-white rounded  text-4xl" >Delete</button>
        </form>
    </div>
</div>
​
​
@endsection
