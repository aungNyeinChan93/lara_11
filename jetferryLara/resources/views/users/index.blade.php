<x-layout>
    <x-slot:heading>
        User List
    </x-slot:heading>
    <ol>
        @foreach ($users as $key => $user)
            <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
        @endforeach
    </ol>

    {{-- list --}}
    @foreach ($users as $user)
        <x-list-card>
            <x-slot:name>{{ $user->name }}</x-slot:name>
            <x-slot:email>{{ $user->email }}</x-slot:email>
        </x-list-card>
    @endforeach
    {{-- list end --}}
</x-layout>
