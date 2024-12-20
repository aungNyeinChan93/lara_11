@props(['customer'])

<a {{ $attributes }} >
    <article
        class="mt-4 hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
        <div class="rounded-[10px] bg-white p-4 !pt-20 sm:p-6">
            <time datetime="2022-10-10" class="block text-xs text-gray-500"> 10th Oct 2022 </time>

            <button>
                <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                   {{$customer->address}}
                </h3>
            </button>

            <div class="mt-4 flex flex-wrap gap-1">
                <span class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600">
                    {{$customer->name}}
                </span>

                <span class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600">
                    {{$customer->email}}
                </span>
            </div>
        </div>
    </article>
</a>
