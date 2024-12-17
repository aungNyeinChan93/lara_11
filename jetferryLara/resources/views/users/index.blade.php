<x-layout>
    <x-slot:heading>
        User List
    </x-slot:heading>

    @foreach ($users as $user)
        <x-list-card href="{{route('users.show',$user->id)}}" :user="$user">
            <x-slot:name>{{ $user->name }}</x-slot:name>
            <x-slot:email>{{ $user->email }}</x-slot:email>
        </x-list-card>
    @endforeach

</x-layout>
