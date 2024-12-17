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
            <x-card  href="{{route('users.show',$user->id)}}" :user="$user">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt cupiditate voluptatum animi?
            </x-card>
        @endforeach
    </div>


</x-layout>
