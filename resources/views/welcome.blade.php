@extends('layout')
@section('content')
@auth
<h1 class="relative top-15 left-0 right-10 w-full flex font-bold items-center text-sm-20 justify-center">Welcome, {{ auth()->user()->name }}</h1>
@else
<h1 class="relative top-15 left-0 right-10 w-full flex font-bold items-center text-sm-20 justify-center">Обучение по програмиране на разбираем език и с ясна идея за професионална реализация</h1>
<div class="relative bottom-26 left-0 right-10 w-full flex items-center justify-center">
    <ul>
        <li>-Целта е придобиване на ИТ професия, а не просто научаване на определен език за програмиране.</li>
        <li>-Обучението е с кратък срок и твоят ментор ще ти съдейства да започнеш работа!</li>
        <li>-Времетраенето на всеки курс е по-малко от 1 година.</li>
        <li>-Включва комбинация от технологии и ще участваш в разработката на истински проекти.</li>
        <li>-Ще имаш ментор и той ще ти помогне да се реализираш.</li>
    </ul>
</div>
@endauth
@endsection


