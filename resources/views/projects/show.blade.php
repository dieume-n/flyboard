@extends('layouts.app')

@section('content')
<h2 class="text-2xl uppercase">{{ $project->title }}</h2>
<p class="mt-5 text-xl">{{ $project->description }}</p>
@endsection