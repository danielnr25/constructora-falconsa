@props(['messages'])

@if($messages)
<div {{ $attributes->merge(['class' => 'text-white bg-red-500 py-2 my-2 rounded-lg text-sm text-center']) }}>
    @foreach ($messages as $message)
    <p>{{ $message }}</p>
    @endforeach
</div>
@endif
