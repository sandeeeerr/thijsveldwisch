<div 
  class="fixed w-full z-50 "
  x-data="{ open: false }" 
  :class="open ? 'mix-blend-normal' : 'mix-blend-difference'" 
>
  <header class="text-white bg-transparent w-full sticky px-2.5 md:px-4">
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

  <!-- Mobiel overlay menu -->
  <div 
      x-show="open" 
      x-cloak 
      class="fixed inset-0 bg-opacity-60 bg-black/70 backdrop-blur-md text-white flex flex-col justify-center items-center z-50 transition duration-300 ease-in-out "
  >
    <nav class="fixed top-0 w-full px-2.5 md:px-4 grid grid-cols-2 items-center py-1 md:hidden z-100">
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
    <!-- Menu Items (2 kolommen) -->
    <div class="grid grid-cols-3 gap-8 text-xl text-center">
        <a href="/" class="hover:underline hover:text-gray-300">Index</a>
        <a href="/" class="hover:underline hover:text-gray-300">Information</a>
        <a href="/" class="hover:underline hover:text-gray-300">Contact</a>
    </div>
  </div>

  <!-- Desktop menu: zichtbaar vanaf md -->
  <nav class="hidden md:grid md:grid-cols-3 gap-4 items-center py-1">
    <!-- Eerste kolom: Thijs Veldwisch, links uitgelijnd -->
    <div class="flex justify-start">
        <a href="/" class="text-white text-left text-xl hover:underline hover:text-gray-300 transition ease-in-out duration-100">
            Thijs Veldwisch
        </a>
    </div>

    <!-- Tweede kolom: Index (links) en Information (rechts) -->
    <div class="flex justify-between">
        <a href="/" class="text-white text-xl hover:underline hover:text-gray-300 transition ease-in-out duration-100">
            Index
        </a>
        <a href="/information" class="text-white text-xl hover:underline hover:text-gray-300 transition ease-in-out duration-100">
            Information
        </a>
    </div>

    <!-- Derde kolom: Contact, rechts uitgelijnd -->
    <div class="flex justify-end">
        <a href="/contact" class="text-white text-right text-xl hover:underline hover:text-gray-300 transition ease-in-out duration-100">
            Contact
        </a>
    </div>
  </nav>
  </header>

</div>
