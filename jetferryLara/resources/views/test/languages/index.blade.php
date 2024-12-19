<x-layout>
    <x-slot:heading>
        Languages
    </x-slot:heading>


    <div>
        <a class="text-green-500 border border-red-400 px-2 rounded text-xl" href="{{route('languages.create')}}">Create</a>
    </div>
    <div>
        <ul class="border p-4 border-red-600 rounded-lg my-3">
            @foreach ($languages as $language)
                <li ><a href="{{route('languages.show',$language->id)}}">{{$language->name}}</a></li>
            @endforeach
        </ul>
    </div>
</x-layout>
