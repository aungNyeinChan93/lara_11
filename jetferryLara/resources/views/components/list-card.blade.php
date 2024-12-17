@props(['user'])

<ul role="list" class="divide-y divide-gray-100">
    <a {{$attributes}} >
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">

                <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900">{{$user->name}}</p>
                    <p class="mt-1 truncate text-xs/5 text-gray-500">{{$user->email}}</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm/6 text-gray-900">{{$user->created_at->format('j-F-Y')}}</p>
                <p class="mt-1 text-xs/5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">{{$user->created_at->diffForHumans()}}</time></p>
            </div>
        </li>
    </a>
</ul>
