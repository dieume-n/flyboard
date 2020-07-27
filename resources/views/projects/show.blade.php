@extends('layouts.app')

@section('content')
<div class="flex items-center py-4">
    <div class="flex justify-between  items-center w-full">
        <p class="text-gray-700 text-sm font-normal uppercase ">
            <a href="/projects">My Projects</a> / {{ $project->title }}
        </p>

        <button class="btn">
            Add Project
        </button>
    </div>

</div>
<div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full lg:w-3/4 px-3">
            <div>
                <h2 class="text-gray-700 text-md font-normal ">Tasks</h2>

                @foreach($project->tasks as $task)
                <div class="card mt-3 text-gray-800">
                    <form action="{{ $project->path() . '/tasks/' . $task->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex items-center">
                            <input type="text" name="body" value="{{ $task->body }}"
                                class="w-full outline-none focus:outline-none">
                            <input type="checkbox"
                                class="form-checkbox h-5 w-5 text-indigo-500 outline-none focus:outline-none active:bg-indigo-700"
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
                <textarea class="card mt-3 w-full" style="min-height: 200px;">Lorem</textarea>
            </div>
        </div>
        <div class="w-full lg:w-1/4 px-3 mt-6 lg:mt-0">
            @include('projects.card')

        </div>
    </div>
</div>


@endsection