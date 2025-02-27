<div>
  <div class="px-2 md:px-4 mt-24 md:mt-36">
    <h1 class="text-3xl md:text-6xl xl:text-7xl text-left max-w-5xl text-white w-2/3 my-3">{{ $post->title }} @if($post->description) - {{ $post->description }} @endif </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5 md:gap-4 ">

      <!-- Container met overlay -->
      <div 
      class="relative flex items-center justify-between px-3 md:px-6 hover:px-8 md:hover:px-10 xl:hover:px-20 trasistion ease-in-out duration-300 mix-blend-difference col-span-2 aspect-[16/9] md:aspect-[16/9]"
      >
        @if ($post->media)
          @if ($post->is_video)
            <!-- Video als achtergrond -->
            <video 
            autoPlay 
              loop 
              muted="true" 
              preload="auto"
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
            
          </div>
        @endif
      </div>
    </div>
    @if($post->services)
      <div class="grid grid-cols-1 md:grid-cols-3 gap-0 md:gap-4 my-3">
        <!-- Eerste kolom: Tekst links uitgelijnd -->
        <div class="text-left">
          <p class="text-white text-lg md:text-xl">Services</p>
        </div>
      
        <!-- Tweede kolom: Tekst rechts uitgelijnd -->
        <div class="text-left md:text-right mt-1 w-1/2 md:w-auto md:mt-0">
          <p class="text-white text-lg md:text-xl ">@if($post->services) {{ $post->services }} @endif</p>
        </div>
      
        <!-- Derde kolom: Leeg -->
        <div></div>
      </div>
    @endif
    @if ($post->content)
      <div class="w-full md:w-2/3 text-left mt-6 md:mt-16 text-white text-lg md:text-xl">
        {!! Str::markdown($post->content) !!}
      </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5 md:gap-4 mt-24 md:mt-36">
      @if ($post->attachments)
      @foreach ($post->attachments as $attachment)
        <div class="relative flex items-center justify-between px-2 md:px-4 hover:px-4 md:hover:px-8 xl:hover:px-12 transition ease-in-out duration-300
          {{ $attachment['full_width'] ? 'col-span-1 md:col-span-2 aspect-[16/9]' : 'aspect-square' }}">
          @if ($attachment['has_audio'])
            <a 
              class="absolute bottom-4 left-4 text-left text-lg md:text-xl z-50 text-white hover:underline mix-blend-difference"
              onclick="toggleMute(this)"
              data-video-id="video-{{ $loop->index }}">
              Unmute
            </a>
          @endif
          @if (Str::endsWith($attachment['file'], ['.mp4', '.avi', '.mkv']))
            <!-- Video -->
            <video id="video-{{ $loop->index }}"  autoPlay preload="auto" loop muted="true" playsinline class="absolute inset-0 w-full h-full object-cover">
              <source src="{{ asset('storage/' . $attachment['file']) }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>

          @elseif (Str::endsWith($attachment['file'], ['.jpg', '.jpeg', '.png', '.webp', '.gif', '.svg', 'avif']))
            <!-- Afbeelding -->
            <img src="{{ asset('storage/' . $attachment['file']) }}" alt="Attachment" class="absolute inset-0 w-full h-full object-cover">
          @else
            <!-- Onbekend bestandstype -->
            <div class="absolute inset-0 flex items-center justify-center bg-black text-white">
              Unsupported file format
            </div>
          @endif
        </div>
      @endforeach
      @endif
    
    </div>
  </div>

</div>
