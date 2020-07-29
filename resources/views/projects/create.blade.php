@extends('layouts.app')

@section('content')
<div class="flex items-center">
    <div class="w-full lg:w-1/2 mx-auto card mt-10">
        <h1 class="text-2xl text-gray-900 text-center">
            Let's start something new
        </h1>
        <form action="/projects" method="POST" class="mt-10">
            @csrf

            @include('projects.partials._form', [
            'project' => new App\Project,
            'buttonText' => 'Create Project',
            'cancelLink' => '/projects'
            ])
        </form>
    </div>
</div>
@endsection