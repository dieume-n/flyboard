@extends('layouts.app')

@section('content')

<div class="flex items-center py-4">
    <div class="flex justify-between  items-center w-full">
        <h2 class="text-gray-700 text-sm font-normal uppercase">My Projects</h2>

        <a href="/projects/create" class="btn btn-indigo" v-on:click.prevent="$modal.show('new-project')">
            Add Project
        </a>
    </div>
</div>

<div class="flex flex-wrap mt-6 -mx-3">
    @forelse($projects as $project)
    <div class="w-full md:w-1/3  px-3 pb-6">
        @include('projects.card')
    </div>
    @empty
    <div>No project yet</div>
    @endforelse
</div>

<new-project-modal></new-project-modal>

@endsection
