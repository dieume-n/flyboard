<label class="block">
    <span class="text-gray-700">Title</span>
    <input class="form-input mt-1 block w-full @error('title') border-red-500 @enderror" placeholder=" Project title..."
        type="text" name="title" value="{{ old('title') ?? $project->title }}">

    @error('title')
    <p class="text-red-500 text-xs  mt-4">
        {{ $message }}
    </p>
    @enderror
</label>

<label class="block mt-5">
    <span class="text-gray-700">Description</span>
    <textarea name="description" placeholder="The project description..."
        class="form-textarea mt-1 block w-full @error('description') border-red-500 @enderror"
        rows="5">{{ old('description') ?? $project->description }}</textarea>

    @error('description')
    <p class="text-red-500 text-xs  mt-4">
        {{ $message }}
    </p>
    @enderror
</label>

<div class="flex items-center mt-5">
    <button type="submit" class="btn btn-indigo uppercase">
        {{ $buttonText }}
    </button>
    <a href="{{ $cancelLink }}" class="ml-3 btn btn-red">Cancel</a>
</div>