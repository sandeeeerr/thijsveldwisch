@props([
  'image',
  'alt' => '',
  'caption' => null,
])

<figure>
  <img
    {{ $attributes->merge(['class' => 'object-cover w-full border rounded-lg shadow']) }}
    src="{{ is_numeric($image) ? Awcodes\Curator\Models\Media::find($image)?->url : $image }}"
    alt="{{ $alt }}"
  >

  @if ($caption)
    <figcaption class="text-lg text-white">
      {{ $caption }}
    </figcaption>
  @endif
</figure>
