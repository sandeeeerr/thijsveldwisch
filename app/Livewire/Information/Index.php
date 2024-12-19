<?php

namespace App\Livewire\Information;

use Livewire\Component;
use Spatie\SchemaOrg\Schema;

class Index extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // SEO Configuratie
        seo()
            ->title($title = 'Information - ' . config('app.name'))
            ->description($description = 'Experimental and playful visual communication studio.')
            ->canonical($url = route('information'))
            ->addSchema(
                Schema::webPage()
                    ->name($title)
                    ->description($description)
                    ->url($url)
                    ->author(Schema::organization()->name(config('app.name')))
            );

        return view('livewire.information.index');
    }
}
