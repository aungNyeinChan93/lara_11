<x-layout>
    <x-slot:heading>
        <h3>User Detail</h3>
    </x-slot:heading>
    <div class="card">
        <div class="card-body">
            <h4>{{ $user->name }}</h4>
            <p>{{ $user->email }}</p>
            <a href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
</x-layout>
