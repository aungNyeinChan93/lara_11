<x-layout>
    <h1>users list</h1>
    <ol>
        @foreach($users as $key => $user)

        <li><a href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a></li>

        @endforeach
    </ol>
</x-layout>
