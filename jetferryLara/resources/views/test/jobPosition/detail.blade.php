<x-layout>

    <x-slot:heading>
        Job Position Detail
    </x-slot:heading>

    <div>
        <h4 class="text-2xl font ">{{$job->title}}</h4>
        <p class="text-red-400">{{$job->salary}} per year</p>
        <p>Employer name - {{$job->employer->name}}</p>
        <ul class="mt-4">
            @foreach ($job->tags as $tag)
                <span class="bg-green-500 px-2 py-1 ml-1 rounded-full ">{{$tag->name}}</span>
            @endforeach
        </ul>
    </div>

</x-layout>
