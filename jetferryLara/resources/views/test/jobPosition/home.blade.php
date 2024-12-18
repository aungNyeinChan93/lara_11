<x-layout>

    <x-slot:heading>
        Job Positions
    </x-slot:heading>

    <div class="w-full my-3 px-5">
        @session('create-job')
            <x-session-alert>
                {{ session('create-job') }}
            </x-session-alert>
        @endsession

        @session('delete-job')
            <x-session-alert>
                {{ session('delete-job') }}
            </x-session-alert>
        @endsession
    </div>

    <div class="w-full my-1 text-end px-5">
        <button class="bg-green-400 hover:bg-green-300 rounded px-2 py-1 "><a
                href="{{ route('jobPosition.createPage') }}">Create Job</a></button>
    </div>

    <div>
        @foreach ($jobs as $job)
            {{-- {{$job->employer->name}} --}}
            {{-- {{$job->tags()->first()->name}} --}}
            <div class="mx-4 my-3 bg-gray-200 p-4 rounded-full hover:bg-gray-400 flex justify-between items-center">
                <a class="hover:text-red-600"
                    href="{{ route('jobPosition.show', $job->id) }}"><strong>{{ $job->title }}</strong></a>
                <div>
                    <form action="{{ route('jobPosition.destroy', $job->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="px-3 py-1 bg-red-500 hover:bg-red-300 rounded-full">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5">
        {{ $jobs->links() }}
    </div>

</x-layout>
