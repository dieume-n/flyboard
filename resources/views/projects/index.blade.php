@extends('layouts.app')

@section('content')

<div class="flex items-center py-4">
    <div class="flex justify-between  items-center w-full">
        <h2 class="text-gray-700 text-sm font-normal uppercase">My Projects</h2>

        <button
            class="bg-indigo-500 hover:bg-indigo-400 active:bg-indigo-700 focus:outline-none focus:shadow-outline text-white text-sm px-4 py-2 rounded shadow-md">
            Add Project
        </button>
    </div>

</div>

<div class="flex flex-wrap mt-8 -mx-3">
    @forelse($projects as $project)
    <div class="w-full md:w-1/3  px-3 pb-6">
        <div class="bg-white rounded-lg shadow-md p-5 h-48 md:h-56 lg:h-48 overflow-hidden">
            <h3 class="text-xl text-gray-800 font-normal uppercase py-4 pl-4 -ml-5 border-l-4 border-indigo-500">
                <a href="{{ $project->path() }}">{{ $project->title}}</a>

            </h3>
            <div class="text-gray-600 mt-2">{{ Str::limit($project->description, 100) }}</div>
        </div>
    </div>
    @empty
    <div>No project yet</div>
    @endforelse
</div>
@endsection