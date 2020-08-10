<div class="card h-48 md:h-56 lg:h-48 flex flex-col">
    <h3 class="text-xl text-gray-800 font-normal py-4 pl-4 -ml-5 border-l-4 border-indigo-500">
        <a href="{{ $project->path() }}">{{ $project->title}}</a>
    </h3>
    <div class="text-gray-600 mt-2 flex-1">{{ Str::limit($project->description, 100) }}</div>
    <div class="text-right">
        @can('manage', $project)
        <a href="javascript.void(0)" class="ml-2 btn btn-red" onclick="event.preventDefault();
            document.getElementById('delete-form').submit();">Delete Project</a>
        <form id="delete-form" action="{{ $project->path() }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
        @endcan
    </div>
</div>
