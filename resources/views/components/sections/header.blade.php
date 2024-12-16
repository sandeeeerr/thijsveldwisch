<header 
    x-data="{ open: false }" 
    :class="open ? 'mix-blend-normal' : 'mix-blend-difference'" 
    class="text-white bg-transparent w-full sticky top-0 px-2.5 md:px-4"
>
  <!-- Mobiele navigatie: 2 kolommen -->
  <nav class="grid grid-cols-2 items-center py-1 md:hidden">
    <!-- Linkerkolom: Thijs Veldwisch -->
    <div class="text-left">
        <a href="/" class="text-white text-xl hover:underline hover:text-gray-300">
            Thijs Veldwisch
        </a>
    </div>

    <!-- Rechterkolom: Menu-icoon -->
    <div class="text-right">
        <button @click="open = !open" class="text-white text-xl hover:underline hover:text-gray-300">
            <span x-text="open ? 'Back' : 'Menu'"></span>
        </button>
    </div>
  </nav>

  <div 
  x-show="open" 
  x-cloak 
  class="fixed inset-0 bg-black/60 backdrop-blur-lg text-white flex flex-col justify-center items-center z-50 transition duration-300 ease-in-out"
>
  <!-- Overlay navigatie -->
  <nav class="fixed top-0 w-full px-2.5 md:px-4 grid grid-cols-2 items-center py-1">
      <div class="text-left">
          <a href="/" class="text-white text-xl hover:underline hover:text-gray-300">
              Thijs Veldwisch
          </a>
      </div>
      <div class="text-right">
          <button @click="open = !open" class="text-white text-xl hover:underline hover:text-gray-300">
              <span x-text="open ? 'Back' : 'Menu'"></span>
          </button>
      </div>
  </nav>

  <!-- Menu Items -->
  <div class="grid grid-cols-3 gap-8 text-xl text-center">
      <a href="/" class="hover:underline hover:text-gray-300">Index</a>
      <a href="/" class="hover:underline hover:text-gray-300">Information</a>
      <a href="/" class="hover:underline hover:text-gray-300">Contact</a>
  </div>
</div>

  <!-- Desktop menu: zichtbaar vanaf md -->
  <nav class="hidden md:grid md:grid-cols-4 gap-4 items-center py-1">
      <div class="flex justify-center">
        <a href="/" class="text-white text-xl hover:underline hover:text-gray-300 ">
          Thijs Veldwisch
        </a>
      </div>
      <div class="flex justify-center">
        <a href="/" class="text-white text-xl hover:underline hover:text-gray-300">
          Index
        </a>
      </div>
      <div class="flex justify-center">
        <a href="/" class="text-white text-xl hover:underline hover:text-gray-300">
          Information
        </a>
      </div>
      <div class="flex justify-center">
        <a href="/" class="text-white text-xl hover:underline hover:text-gray-300">
          Contact
        </a>
      </div>
  </nav>
</header>
