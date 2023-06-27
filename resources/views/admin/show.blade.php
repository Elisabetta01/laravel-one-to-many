@extends('layouts.app')

@section('title')

    Laravel-auth | Projects Show

@endsection

@section('content')
    <div class="container">
        <h2>Singolo Progetto: {{ $project->id }}</h2>

        <div class="mt-4">
             <h3>{{ $project->title }}</h3>
             <p>{{ $project->description }}</p>
             <img src="{{ asset('storage/' . $project->img) }}" alt="" class="img-fluid">
        </div>

     </div>
@endsection

