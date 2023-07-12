<?php

namespace App\Http\Livewire\Front\Main\Transport;

use App\Models\Section;
use App\Models\Service;
use App\Models\Transport;
use Livewire\Component;

class TransportComponent extends Component
{
    public function render()
    {
        $section = Section::whereActive(true)->whereRoute('transport')->first();
        $transports = Service::whereHomepage(true)->orderBy('ordering','asc')->take(4)->get();
        return view('livewire.front.main.transport.transport-component', compact('section', 'transports'));
    }
}
