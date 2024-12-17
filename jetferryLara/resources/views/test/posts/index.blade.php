<x-layout>

    <x-slot:heading>
        Post Lists
    </x-slot:heading>

    <div class="my-3 grid md:grid-cols-4 gap-5 ">
        @foreach ($posts as $post)
           <x-post-component :post="$post" href="{{ route('posts.show',$post->id) }}"/>
        @endforeach
    </div>

</x-layout>
