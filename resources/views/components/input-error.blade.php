@props(['for'])

@error($for)
<p {{ $attributes->merge(['class' => 'text-md text-red-600']) }}>{{ $message }}</p>
@enderror
