<div class="card mt-4">
    <ul class="text-xs">
        @foreach ($project->activities as $activity)
        <li class="{{ $loop->last ? '' : 'mb-1' }}">
            @include("projects.activities.{$activity->description}")
            <span class="text-gray-500 ml-2">{{ $activity->created_at->diffForHumans() }}</span>
        </li>
        @endforeach
    </ul>
</div>
