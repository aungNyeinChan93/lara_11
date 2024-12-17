<x-layout>
    <x-slot:heading>
        User List
    </x-slot:heading>
    <ol>
        @foreach($users as $key => $user)

        <li><a href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a></li>

        @endforeach
    </ol>
</x-layout>
