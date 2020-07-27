<div class="card h-48 md:h-56 lg:h-48">
    <h3 class="text-xl text-gray-800 font-normal py-4 pl-4 -ml-5 border-l-4 border-indigo-500">
        <a href="{{ $project->path() }}">{{ $project->title}}</a>
    </h3>
    <div class="text-gray-600 mt-2">{{ Str::limit($project->description, 100) }}</div>
</div>