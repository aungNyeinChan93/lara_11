<x-layout>
    <x-slot:heading>
        Langauge Update
    </x-slot:heading>

    <div>
        <form action="{{route('languages.update',$language->id)}}" method="POST">
            @csrf
            @method('put')

            <div class="my-4">
                <input type="text" name="name" value="{{$language->name }}" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                    placeholder="Enter name" />
                    @error('name')
                        <small class="text-md font-mono text-red-500 ">{{$message}}</small>
                    @enderror
            </div>

            <button type="submit" class="px-4 py-2 mt-4 bg-green-500 rounded">Update</button>
            <button  class="px-4 py-2 mt-4 bg-gray-500 rounded"><a href="{{route('languages.index')}}" >Back</a></button>
        </form>
    </div>

</x-layout>
