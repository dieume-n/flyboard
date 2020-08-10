@extends('layouts.app')

@section('content')
<div class="flex items-center py-4">
    <div class="flex justify-between  items-center w-full">
        <p class="text-gray-700 text-sm font-normal uppercase ">
            <a href="/projects">My Projects</a> / {{ $project->title }}
        </p>
        <div class="flex items-center">

            <div class="flex overflow-hidden mr-4">
                @foreach ($project->members as $member)
                <img src="{{ Avatar::create($member->name)->toBase64() }}" alt="{{ $member->name}}'s avatar"
                    class="{{ $loop->first ? '' : '-ml-3' }} inline-block h-8 w-8 rounded-full text-white shadow-solid">

                @endforeach
            </div>

            <a href="{{ $project->path() .'/edit'}}" class="btn btn-indigo">
                Edit Project
            </a>
        </div>

    </div>

</div>
<div>
    <div class=" flex flex-wrap -mx-3">
        <div class="w-full lg:w-3/4 px-3">
            <div>
                <h2 class="text-gray-700 text-md font-normal ">Tasks</h2>

                @foreach($project->tasks as $task)
                <div class="card mt-3 text-gray-800">
                    <form action="{{ $task->path() }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex items-center">
                            <input type="text" name="body" value="{{ $task->body }}"
                                class="w-full outline-none focus:outline-none {{ $task->completed ? 'text-gray-500 line-through': 'text-gray-800' }}">
                            <input type="checkbox" name="completed" @if($task->completed) checked @endif
                            class="form-checkbox h-5 w-5 text-indigo-500 outline-none focus:outline-none
                            focus:bg-white
                            active:bg-indigo-700 "
                            onChange="this.form.submit()">
                        </div>

                    </form>
                </div>
                @endforeach
                <div class="card mt-3">
                    <form action="{{ $project->path() . '/tasks' }}" method="POST">
                        @csrf
                        <input type="text" name="body" placeholder="Add a new task..."
                            class="online-none focus:outline-none focus:bg-white w-full text-gray-800">
                    </form>
                </div>

                {{-- Tasks --}}
            </div>

            <div class="mt-8">
                <h2 class="text-gray-700 text-md font-normal ">General Notes</h2>
                {{-- General Notes --}}
                <form action="{{ $project->path() }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <textarea
                            class="card online-none focus:outline-none focus:bg-white mt-3 w-full @error('notes') border-red-500 @enderror"
                            style="min-height: 200px;" name="notes"
                            placeholder="Anything special that you want to make a note of?">{{ $project->notes }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-indigo mt-3">Save</button>
                </form>

            </div>
        </div>
        <div class="w-full lg:w-1/4 px-3 mt-6 lg:mt-0">
            @include('projects.card')

            @can('manage', $project)
            @include('projects.invitation')
            @endcan

            @include("projects.activities.card")
        </div>
    </div>
</div>


@endsection
