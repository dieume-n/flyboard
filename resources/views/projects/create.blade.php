@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-2xl uppercase">Create Project</h1>
    <form action="/projects" method="POST" class="mt-10">
        @csrf

        <label class="block">
            <span class="text-gray-700">Input</span>
            <input type="email" class="form-input mt-1 block w-full" placeholder="john@example.com">
        </label>

        <label class="block mt-5">
            <span class="text-gray-700">Textarea</span>
            <textarea class="form-textarea mt-1 block w-full" rows="3"
                placeholder="Enter some long form content."></textarea>
        </label>


        <button type="submit"
            class="bg-purple-600 border py-2 px-4 rounded uppercase text-white w-40 mt-5">Submit</button>

    </form>

</div>

@endsection