<x-layout>
    <x-slot:heading>
        Job Positions
    </x-slot:heading>
    @foreach ($jobs as $job)
        <li><a href="{{route('jobPosition.show',$job->id)}}"><strong>{{$job->title}}</strong></a> . <span class="text-md text-red-500">{{$job->salary}}</span></li>
    @endforeach
</x-layout>
