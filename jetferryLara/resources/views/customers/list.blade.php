<x-layout>
    <div class="container">
        <x-slot:heading >
            <h3>Customer List</h3>
        </x-slot:heading>

        <button class="bg-red-400 rounded px-4 py-1 my-1 float-end">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="Logout">
            </form>
        </button>

        <br>

        {{-- @dump($customers->toArray()) --}}
        <ul>
            @foreach($customers as $key => $customer)
                {{-- <li><a href="{{ route('customers.show',$customer->id) }}">{{ $customer->name }}</a></li> --}}
                <x-customer-list-card  href="{{ route('customers.show',$customer->id) }} " :customer="$customer"></x-customer-list-card>
            @endforeach
        </ul>
    </div>
</x-layout>
