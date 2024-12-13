<x-layout>
    <div class="container">
        <h3>Customer List</h3>

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
