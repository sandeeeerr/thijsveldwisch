@props([
  'title' => null,
  'afterTitle' => null,
])

<div {{ $attributes->merge(['class' => 'py-16 text-white mb-8']) }}>
  <x-container>
    <h1 class="text-4xl">{{ $title ?? $slot }}</h1>

    @if ($afterTitle)
      <div class="mt-4">
        {{ $afterTitle }}
      </div>
    @endif
  </x-container>
</div>
