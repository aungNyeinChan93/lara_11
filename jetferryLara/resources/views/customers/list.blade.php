<x-layout>
    <div class="container">
        <x-slot:heading>
            <h3>Customer List</h3>
        </x-slot:heading>

        <div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="Logout">
            </form>
        </div>

        <ul>
            @foreach($customers as $key => $customer)
                <li><a href="{{ route('customers.show',$customer->id) }}">{{ $customer->name }}</a></li>
            @endforeach
        </ul>
    </div>
</x-layout>
