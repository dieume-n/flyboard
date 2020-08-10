<div class="card mt-4">
    <h3 class="text-xl text-gray-800 font-normal py-4 pl-4 -ml-5 border-l-4 border-indigo-500">
        Invite a User
    </h3>
    <form action="{{$project->path() . '/invitations'}}" method="POST">
        @csrf
        <label class="block">
            {{-- <span class="text-gray-700 text-sm">Email address</span> --}}
            <input class="form-input mt-1 block w-full text-sm @error('email') border-red-500 @enderror"
                placeholder="Email address" type="text" name="email" value="{{ old('email') ?? $project->email }}">

            @error('email')
            <p class="text-red-500 text-xs  mt-4">
                {{ $message }}
            </p>
            @enderror
        </label>
        <button type="submit" class="btn btn-indigo mt-5">Invite</button>
    </form>
</div>
