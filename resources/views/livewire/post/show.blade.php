<div>
  <div class="px-2.5 md:px-4 mt-20 md:mt-36">
    <h2 class="text-3xl md:text-6xl xl:text-7xl text-left max-w-5xl text-white w-2/3 my-3">{{ $post->title }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5 md:gap-4 ">

      <!-- Container met overlay -->
      <div 
        class="relative flex items-center justify-between px-3 md:px-6 hover:px-8 md:hover:px-10 xl:hover:px-20 trasistion ease-in-out duration-300 mix-blend-difference col-span-2 aspect-[3/2] md:aspect-[16/9]"
      >
        @if ($post->media)
          @if ($post->is_video)
            <!-- Video als achtergrond -->
            <video 
              autoplay 
              loop 
              muted 
              playsinline 
              class="absolute inset-0 w-full h-full object-cover z-0"
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
      </div>
    </div>
    <div class="grid grid-cols-3 gap-4 my-3">
      <!-- Eerste kolom: Tekst links uitgelijnd -->
      <div class="text-left">
        <p class="text-white text-lg md:text-xl">Services</p>
      </div>
    
      <!-- Tweede kolom: Tekst rechts uitgelijnd -->
      <div class="text-right">
        <p class="text-white text-lg md:text-xl">Visual design, Motion, Creative coding</p>
      </div>
    
      <!-- Derde kolom: Leeg -->
      <div></div>

      <div class="col-span-3 text-left mt-16 text-white text-lg md:text-xl">
        @foreach ($post->blocks as $block)
          @switch($block->type)
            @case('markdown')
              @markdom($block->data->content)
            @break
            @default
              @dump($block)
          @endswitch
        @endforeach
      </div>
    </div>
  </div>

</div>
