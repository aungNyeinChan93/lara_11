<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <div class="grid grid-cols-2 gap-4">
        <x-job-create-form :employers="$employers"/>
    </div>
</x-layout>
