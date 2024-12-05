<div>
  <x-container>
    {{-- <div class="grid grid-cols-1 gap-10 mt-6">
      @foreach ($posts as $post)
        <div>
          <a
            class="*:transition group"
            href="{{ $post->url }}"
            wire:navigate
          >
            <p class="text-white">{{ $post->title }}</p>
          </a>
        </div>
      @endforeach

      @empty($posts)
        <div>No posts yet.</div>
      @endempty
    </div> --}}
    <div class="flex items-center justify-center min-h-screen">
      <p class="text-white text-xl">Coming Soon!</p>
    </div>
  </x-container>
</div>
