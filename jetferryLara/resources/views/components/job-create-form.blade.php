@props(['employers'])



<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
        <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Create Job</h1>

        <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
            inventore quaerat mollitia?
        </p>

        <form action="{{ route('jobPosition.create') }}" method="POST"
            class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
            @csrf


            <div class="mt-4">
                <label for="title" class="sr-only">Enter Title</label>
                <div class="relative">
                    <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        name="title" value="{{ old('title') }}" placeholder="Enter title" />
                    @error('title')
                        <small class="text-red-600 text-md">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label for="salary" class="sr-only">Enter Salary</label>
                <div class="relative">
                    <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        name="salary" value="{{ old('salary') }}" placeholder="Enter salary" />
                    @error('salary')
                        <small class="text-red-600 text-md">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label for="employer_id" class="sr-only">Employer</label>
                <select id="employer_id" name="employer_id" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
                    <option value=''>Choose</option>
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}" @if (old('employer_id') == $employer->id) selected @endif>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
                @error('employer_id')
                    <small class="text-red-600 text-md">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit"
                class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white mt-4">
                Create
            </button>

        </form>
    </div>
</div>
