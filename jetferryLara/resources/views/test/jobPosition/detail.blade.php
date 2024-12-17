<x-layout>

    <x-slot:heading>
        Job Position Detail
    </x-slot:heading>

    <div>
        <h4 class="text-2xl font ">{{$job->title}}</h4>
        <p class="text-red-400">{{$job->salary}} per year</p>
    </div>

</x-layout>
