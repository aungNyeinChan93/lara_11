@props(['session'])

<div {{$attributes}} role="alert" class="rounded border-s-4 border-green-500 bg-green-50 p-4">
    <strong class="block font-medium text-green-800"> {{session($session)}} </strong>
</div>
