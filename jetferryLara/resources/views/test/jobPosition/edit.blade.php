<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <div class="grid grid-cols-2 gap-4">

        <x-job-update-form :employers="$employers" :job="$job" />
    </div>
</x-layout>
