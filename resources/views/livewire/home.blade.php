<div>
  <x-container>
    <div class="grid grid-cols-1 gap-10 mt-6 my-auto">
      @foreach ($posts as $post)
        @if($post->videos)
          <div class="mx-auto">
            <div 
              class="*:transition group mb-4 cursor-pointer"
              href="{{ $post->url }}"
              wire:navigate 
            >
              <video 
                autoplay 
                loop 
                muted 
                playsinline 
                class="w-full max-w-md rounded shadow-lg"
              >
                {{-- Pak alleen de eerste video --}}
                <source src="{{ Storage::url(collect($post->videos)->first()) }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
        @endif
      @endforeach

      @empty($posts)
        <div>No posts yet.</div>
      @endempty
    </div>
  </x-container>
</div>
