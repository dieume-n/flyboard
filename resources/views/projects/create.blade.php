@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-2xl uppercase text-gray-900 mt-10">Create Project</h1>
    <form action="/projects" method="POST" class="mt-10">
        @csrf

        <label class="block">
            <span class="text-gray-700">Title</span>
            <input type="text" name="title" class="form-input mt-1 block w-full" placeholder="Project title...">
        </label>

        <label class="block mt-5">
            <span class="text-gray-700">Description</span>
            <textarea class="form-textarea mt-1 block w-full" name="description" rows="5"
                placeholder="The project description..."></textarea>
        </label>


        <button type="submit" class="btn mt-5 uppercase">Create
            Project</button>

    </form>

</div>

@endsection