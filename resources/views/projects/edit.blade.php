@extends('layouts.app')

@section('content')
<div class="flex items-center">
    <div class="w-full lg:w-1/2 mx-auto card mt-10">
        <h1 class="text-2xl text-gray-900 text-center">Edit Your Project</h1>
        <form action="{{ $project->path() }}" method="POST" class="mt-10">
            @csrf
            @method('PATCH')

            @include('projects.partials._form', [
            'buttonText' => 'Update Project',
            'cancelLink' => $project->path()
            ])
        </form>
    </div>
</div>
@endsection