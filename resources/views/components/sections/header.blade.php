<div 
  class="fixed w-full z-50 "
  x-data="{ open: false }" 
  :class="open ? 'mix-blend-normal' : 'mix-blend-difference'" 
>
  <header class="text-white bg-transparent w-full sticky px-2 md:px-4 items-center container max-w-[1920px]">
  <!-- Mobiele navigatie: 2 kolommen -->
  <nav class="grid grid-cols-2 items-center py-2 md:hidden">
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
        x-cloak 
        x-show="open"
        x-transition:enter="opacity-0"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-opacity-60 bg-black/70 backdrop-blur-md text-white flex flex-col justify-center items-center z-50 transition-all duration-300 ease-in-out"
    >
        <nav class="fixed top-0 w-full px-2 md:px-4 grid grid-cols-2 items-center py-2 md:hidden z-100">
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

        <div class="relative grid grid-cols-3 gap-8 text-xl text-center w-full px-2 md:px-4">
            <!-- Menu item 1 -->
            <div 
                class="flex justify-start transform transition-all duration-300 ease-in-out"
                x-show="open"
                x-transition:enter="ml-20 opacity-0 "
                x-transition:enter-start="ml-20 opacity-0 "
                x-transition:enter-end="ml-0 opacity-100 "
            >
                <a href="/" class="hover:underline hover:text-gray-300">Index</a>
            </div>

            <!-- Menu item 2 -->
            <div 
                class="flex justify-center transform transition-all duration-300 ease-in-out"
                x-show="open"
                x-transition:enter="transform opacity-0 "
                x-transition:enter-start="opacity-0 "
                x-transition:enter-end="opacity-100 "
            >
                <a href="/information" class="hover:underline hover:text-gray-300">Information</a>
            </div>

            <!-- Menu item 3 -->
            <div 
                class="flex justify-end transform transition-all duration-300 ease-in-out"
                x-show="open"
                x-transition:enter="mr-20 opacity-0 "
                x-transition:enter-start="mr-20 opacity-0 "
                x-transition:enter-end="mr-0 opacity-100 "
            >
                <a href="mailto:veldwischthijs@gmail.com" class="hover:underline hover:text-gray-300">Contact</a>
            </div>
        </div>
    </div>

    <!-- Desktop menu: zichtbaar vanaf md -->
    <nav class="hidden md:grid grid-cols-3 py-2 md:py-4">
        <!-- Eerste kolom: Thijs Veldwisch, links uitgelijnd -->
        <div class="flex justify-start">
            <a href="/" class="text-white text-left text-xl hover:underline hover:text-gray-300 transition ease-in-out duration-100">
                Thijs Veldwisch test push
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
            <a href="mailto:veldwischthijs@gmail.com" class="text-white text-right text-xl hover:underline hover:text-gray-300 transition ease-in-out duration-100">
                Contact
            </a>
        </div>
    </nav>
    </header>
</div>
