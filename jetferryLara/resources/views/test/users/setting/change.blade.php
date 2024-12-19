<x-layout>


    <x-slot:heading>
        Password Change
    </x-slot:heading>

    <form action="{{route('userSetting.update')}}" method="POST" class="max-w-sm mx-auto border p-4 rounded-md mt-5 bg-gray-200 shadow-sm">
        @csrf

        <div class="my-3">  
            <input type="text" name="oldPassword"
                class="shadow-sm bg-gray-50 border border-gray-300 text-sm text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Old Password" />
                @error('oldPassword')
                    <small class="text-red-500 text-xs font-mono">  {{ $message }}</small>
                @enderror
        </div>
        <div class="my-3">
            <input type="text" name="password"
                class="shadow-sm bg-gray-50 border border-gray-300 text-sm text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="New Password" />
                @error('password')
                    <small class="text-red-500 text-xs font-mono">  {{ $message }}</small>
                @enderror
        </div>
        <div class="my-3">
            <input type="text" name="password_confirmation"
                class="shadow-sm bg-gray-50 border border-gray-300 text-sm text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Confirm Password" />
                @error('password_confirmation')
                    <small class="text-red-500 text-xs font-mono">  {{ $message }}</small>
                @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 px-3 py-1 rounded mt-4 ">
            Update Password
        </button>
    </form>



</x-layout>
