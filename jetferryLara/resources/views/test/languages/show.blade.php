<x-layout>
    <x-slot:heading>
        Language Detail
    </x-slot:heading>


    <div>
        <div class="border p-4 border-red-600 rounded-lg my-3">
            <p class="mb-3">{{ $language->name }}</p>
            <a href="{{ route('languages.index') }}" class="bg-green-400 rounded px-3 py-1">Back</a>


            @can('update', $language)
                <a href="{{ route('languages.edit', $language->id) }}" class=" bg-green-400 rounded px-3 py-1">Edit</a>
            @endcan

            @can('delete', $language)
                <button type="submit" class="bg-red-400 rounded p-1" form="delete-lang">Delete</button>
            @endcan

        </div>

        <form action="{{ route('languages.destroy', $language->id) }}" method="POST" id="delete-lang" class="hidden">
            @csrf
            @method('delete')
        </form>
    </div>
</x-layout>
