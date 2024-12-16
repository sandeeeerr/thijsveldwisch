<div class="px-2.5 md:px-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5md:gap-4 my-20 md:my-32 z-0">
      @foreach ($posts as $post)
        <div 
          class="bg-white flex items-center justify-between px-4 md:px-6 hover:px-8 md:hover:px-24 trasistion ease-in-out duration-300 cursor-pointer
          @if($post->full_width) col-span-2 aspect-[16/9] @else aspect-square @endif"
          class="*:transition group mb-4 cursor-pointer "
          href="#"
        >
          <div class="flow-root w-full">
            <!-- Linkerzijde: Titel -->
            <div class="text-black text-left float-left text-lg md:text-xl">
              {{ $post->title }}
            </div>

            <!-- Rechterzijde: Post Type -->
            <div class="text-black text-right float-right text-lg md:text-xl">
                {{ $post->post_type }}
            </div>
          </div>

            @if($post->videos)
                <video 
                    autoplay 
                    loop 
                    muted 
                    playsinline 
                    class="w-full h-full object-cover rounded shadow-lg"
                >
                    {{-- Pak alleen de eerste video --}}
                    <source src="{{ Storage::url(collect($post->videos)->first()) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
          </div>
  
      @endforeach

      @empty($posts)
          <div class="col-span-2 text-center text-gray-500">
              No posts yet.
          </div>
      @endempty
  </div>
</div>
