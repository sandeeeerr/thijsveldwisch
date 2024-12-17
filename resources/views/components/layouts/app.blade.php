<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    {{ seo()->render() }}

    @stack('head')

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="font-neue-haas font-normal flex flex-col text-base leading-normal tracking-normal text-gray-800 bg-black">
    <div class="flex flex-col min-h-screen">
      <div class="fixed w-full z-50">
        <x-sections.header />
      </div>

      <div class="flex-1">
        {{ $slot }}
      </div>

      <x-sections.footer />
    </div>

    @livewireScriptConfig
    @stack('scripts')
  </body>
</html>
