<?php

namespace App\Http\Livewire\Front\Pages\Contacts;

use App\Models\Application;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Icon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

class ContactsComponent extends Component
{
    use LivewireAlert;

    public $user;
    public $email;
    public $phone;
    public $message;
    public $call_source;
    public $recaptcha;

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
        $contact->call_source = 'Contacts page';
        $contact->save();
        $this->resetFormModal();
        $this->dispatchBrowserEvent('notify');

    }
    public function render()
    {
        $page = Page::whereActive(true)->whereRoute('contacts')->first();
        $og = Page::whereActive(true)->whereRoute('landing')->first();
        $contacts = Contact::whereActive(true)->first();
        $iconsContact = Icon::whereType('contact')->whereActive(true)->orderBy('ordering','asc')->get();
        $icons = Icon::whereType('social')->whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.pages.contacts.contacts-component', compact('og','page','contacts', 'iconsContact', 'icons'))->extends('layouts.app', ['page' => $page, 'og' => $og]);
    }
}
