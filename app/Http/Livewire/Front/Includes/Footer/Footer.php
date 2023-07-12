<?php

namespace App\Http\Livewire\Front\Includes\Footer;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Icon;
use App\Models\Page;
use Livewire\Component;

class Footer extends Component
{
    public $active_page;

    public function render()
    {
        $contacts = Contact::first();
        $main = Page::whereRoute('landing')->first();
        $mainPages = Page::whereSection('main')->whereActive(true)->where('has_footer', true)->orderBy('ordering','asc')->get();
        $infoPages = Page::whereSection('informational')->where('has_footer', true)->whereActive(true)->orderBy('ordering','asc')->get();
        $icons = Icon::whereType('social')->whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.includes.footer.footer', compact('contacts', 'mainPages', 'infoPages', 'icons', 'main'));
    }
}
