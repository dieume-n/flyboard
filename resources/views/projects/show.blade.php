@extends('layouts.app')

@section('content')
<div class="flex items-center py-4">
    <div class="flex justify-between  items-center w-full">
        <p class="text-gray-700 text-sm font-normal uppercase ">
            <a href="/projects">My Projects</a> / {{ $project->title }}
        </p>

        <button
            class="bg-indigo-500 hover:bg-indigo-400 active:bg-indigo-700 focus:outline-none focus:shadow-outline text-white text-sm px-4 py-2 rounded shadow-md">
            Add Project
        </button>
    </div>

</div>
<div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full lg:w-3/4 px-3">
            <div>
                <h2 class="text-gray-700 text-md font-normal ">Tasks</h2>
                <div class="card mt-3">Lorem</div>
                <div class="card mt-3">Lorem</div>
                <div class="card mt-3">Lorem</div>
                <div class="card mt-3">Lorem</div>
                <div class="card mt-3">Lorem</div>
                {{-- Tasks --}}
            </div>

            <div class="mt-8">
                <h2 class="text-gray-700 text-md font-normal ">General Notes</h2>
                {{-- General Notes --}}
                <textarea class="card mt-3 w-full" style="min-height: 200px;">Lorem</textarea>
            </div>
        </div>
        <div class="w-full lg:w-1/4 px-3 mt-6 lg:mt-0">
            @include('projects.card')

        </div>
    </div>
</div>


@endsection