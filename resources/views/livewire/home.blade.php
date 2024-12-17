<div class="px-2.5 md:px-4 ">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5 md:gap-4 mt-14 md:mt-20">
    @foreach ($posts as $post)
      <!-- Container met overlay -->
      <div 
        class="relative flex items-center justify-between px-3 md:px-6 hover:px-8 md:hover:px-10 xl:hover:px-20 trasistion ease-in-out duration-300 cursor-pointer
        @if($post->full_width) col-span-2 aspect-[16/9] @else aspect-square @endif"
        href="{{ route('post.show', $post) }}"
        wire:navigate
      >
        <!-- Achtergrond Media -->
        @if ($post->media)
          @if ($post->is_video)
            <!-- Video als achtergrond -->
            <video 
              autoplay 
              loop 
              muted 
              playsinline 
              class="absolute inset-0 w-full h-full object-cover"
            >
              <source src="{{ $post->media_url }}" type="{{ $post->media->mime_type }}">
              Your browser does not support the video tag.
            </video>
          @else
            <!-- Afbeelding als achtergrond -->
            <img
              class="absolute inset-0 w-full h-full object-cover z-0"
              src="{{ $post->media_url }}"
              alt="{{ $post->media->alt ?? $post->title }}"
            />
          @endif
        @else
          <!-- Placeholder wanneer er geen media is -->
          <div class="absolute inset-0 flex items-center justify-center bg-gray-200 text-gray-400 z-0">
            Article
          </div>
        @endif

        <!-- Tekst Overlay -->
        <div class="relative z-10 flex w-full justify-between text-white">
          <!-- Linkerzijde: Titel -->
          <div class="text-left text-lg md:text-xl">
            {{ $post->title }}
          </div>

          <!-- Rechterzijde: Post Type -->
          <div class="text-right text-lg md:text-xl">
            {{ $post->post_type }}
          </div>
        </div>
      </div>
    @endforeach

    <!-- Geen posts -->
    @empty($posts)
      <div class="col-span-2 text-center text-gray-500">
        No posts yet.
      </div>
    @endempty
  </div>
</div>
