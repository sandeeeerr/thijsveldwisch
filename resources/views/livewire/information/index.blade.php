<div class="px-2.5 md:px-4 mt-24 md:mt-36">
    <!-- Titel -->
    <h2 class="text-6xl md:text-9xl xl:text-10xl text-left max-w-5xl text-white w-2/3 my-3">
        Experimental
        <br>
        & Playful
    </h2>

    <!-- Grid met individuele secties -->
    <div class="grid gap-12 my-16 md:my-24 text-white">
        @foreach ([
            'about' => 'About',
            'services' => 'Services',
            'experience' => 'Experience',
            'info_contact' => 'Info+contact'
        ] as $key => $label)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5">
                <div class="text-left text-lg md:text-xl">{{ $label }}</div>
                <div class="text-left text-lg md:text-xl">
                    {!! Str::markdown(App\Models\Setting::get($key, "Default $label text")) !!}
                </div>
                <div></div>
            </div>
        @endforeach
    </div>
</div>
