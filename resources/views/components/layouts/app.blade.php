<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    {{ seo()->render() }}

    @stack('head')

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="font-neue-haas font-normal flex flex-col text-base tracking-normal text-gray-800 bg-black leading-normal">
    <div class="flex flex-col min-h-screen">
      <div class="container mx-auto max-w-[1920px]">
        <x-sections.header />

        <div class="flex-1">
          {{ $slot }}
        </div>

        <x-sections.footer />
      </div>
    </div>
    @livewireScriptConfig
    @stack('scripts')
  </body>
</html>
