<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use Spatie\SchemaOrg\Schema;

class Index extends Component
{
    public function render()
    {
        seo()
            ->title($title = 'Contact - ' . config('app.name'))
            ->description($description = 'Lorem ipsum...')
            ->canonical($url = route('contact'))
            ->addSchema(
                Schema::webPage()
                    ->name($title)
                    ->description($description)
                    ->url($url)
                    ->author(Schema::organization()->name(config('app.name')))
            );

        return view('livewire.contact.index');
    }
}
