<x-layout>
    <x-slot:heading>
        Posts Detail
    </x-slot:heading>

    <article class="rounded-xl border-2 border-gray-100 bg-white">
        <div class="flex items-start gap-4 p-4 sm:p-6 lg:p-8">
            <a href="#" class="block shrink-0">
                {{-- <img alt=""
                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                    class="size-14 rounded-lg object-cover" /> --}}
            </a>

            <div>
                <h3 class="font-medium sm:text-lg">
                    <a href="#" class="hover:underline"> {{ $post->title }} </a>
                </h3>

                <p class="line-clamp-2 text-sm text-gray-700">
                    {{ $post->description }}
                </p>

                <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                    <div class="flex items-center gap-1 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>

                        {{-- <p class="text-xs">14 comments</p> --}}
                    </div>

                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                    <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                        Posted by
                        <a href="#" class="font-medium underline hover:text-gray-700"> {{ $post->user->name }}
                        </a>
                    </p>
                </div>


                @if (count($post->comments) !== 0)
                    <h4 class="text-md underline p-2 ">Comments</h4>
                @endif
                <ul>
                    @foreach ($post->comments as $comment)
                        <div>
                            <li class="text-xs text-blue-600 font-mono p-3 border my-1 border-red-500 rounded ">
                                <span>{{ $comment->body }}</span>
                            </li>
                            <div class="text-xs text-gray-400 ms-3">
                                <span>{{ $comment->user->name }} ( {{ $comment->user->created_at->diffForHumans() }} )
                                </span>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex justify-between">
            <div class="mx-3">
                <button class="px-3 py-1 my-1 bg-green-500 rounded"><a href="{{ route('posts.index') }}"
                        class="">Back</a></button>
            </div>
            <strong
                class="-mb-[2px] -me-[2px] inline-flex items-center gap-1 rounded-ee-xl rounded-ss-xl bg-green-600 px-3 py-1.5 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>

                {{-- <span class="text-[10px] font-medium sm:text-xs">Solved!</span> --}}
            </strong>
        </div>
    </article>

</x-layout>
