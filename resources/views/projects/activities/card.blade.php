<div class="card mt-4">
    <ul class="text-xs">
        @forelse ($project->activities as $activity)
        <li class="{{ $loop->last ? '' : 'mb-1' }}">
            @include("projects.activities.{$activity->description}")
            <span class="text-gray-500 ml-2">{{ $activity->created_at->diffForHumans() }}</span>
        </li>
        @empty
        <h3>No activity</h3>
        @endforelse
    </ul>
</div>
