<x-layout>
    <div class="container">
        <x-slot:heading>
            Customer Detail
        </x-slot:heading>
        <div class="card">
            <div class="card-header">
                <h4>{{ $customer->name }} || <span>Role ({{ $customer->type }})</span></h4>
            </div>
            <div class="card-body">
                <p>{{ $customer->email }}</p>
                <p>{{ $customer->address }}</p>
            </div>
        </div>
    </div>
</x-layout>
