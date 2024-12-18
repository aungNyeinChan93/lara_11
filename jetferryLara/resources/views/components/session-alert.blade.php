

<div {{ $attributes->merge(['class' => 'rounded border-s-4 border-green-500 bg-green-50 p-4', 'role' => 'alert']) }}>
    <strong class="block font-medium text-green-800">{{$slot}}</strong>
</div>
