<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyboard</title>
</head>

<body>
    <h1>Flyboard</h1>
    <ul>
        @forelse($projects as $project)
        <a href="{{ $project->path() }}">
            <li>{{ $project->title}}</li>
        </a>
        @empty
        <p>No project yet</p>
        @endforelse
    </ul>
</body>

</html>