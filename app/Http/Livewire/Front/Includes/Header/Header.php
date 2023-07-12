<?php

namespace App\Http\Livewire\Front\Includes\Header;

use App\Models\Application;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Section;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Header extends Component
{
    use LivewireAlert;

    public $user;
    public $email;
    public $phone;
    public $message;
    public $call_source;
    public $recaptcha;
    public $active_page;

    private function resetFormModal()
    {
        $this->user = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }
    public function sendForm()
    {
        $this->validate([
            'user' => 'required|min:1',
            'email' => 'required|email|min:1',
            'phone' => 'required|min:9',
            'recaptcha' => 'required|captcha',

        ]);

        $contact = new Application();
        $contact->user = $this->user;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->message = $this->message;
        $contact->call_source = 'Callback Form';
        $contact->save();
        $this->resetFormModal();
        $this->dispatchBrowserEvent('notify');
    }

    public function render()
    {
        $section = Section::whereActive(true)->whereOriginTitle('Offer')->first();
        $contacts = Contact::whereActive(true)->first();
        $originPages = Page::whereType('origin')->whereActive(true)->orderBy('ordering','asc')->get();
        $customPages = Page::whereType('custom')->whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.includes.header.header', compact('section', 'contacts', 'originPages', 'customPages'));
    }
}
