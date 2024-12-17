<x-layout>
    <x-slot:heading>Home Page</x-slot:heading>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nesciunt accusantium at voluptatibus architecto
        velit recusandae itaque maiores. Animi, enim?</p>

    <x-test>
        <x-slot:header>
            Alert header
        </x-slot:header>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro accusamus ipsa minima.
    </x-test>

    <div class=" grid grid-cols-4 my-3 gap-5">
        @foreach ($users as $user)
            <x-card>
                <x-slot:title>
                   {{$user->name}}
                </x-slot:title>
                desc Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae veritatis repellat porro!
            </x-card>
        @endforeach
    </div>
</x-layout>
