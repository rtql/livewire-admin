<?php

namespace App\Http\Livewire\Front\Main\Offer;

use App\Models\Application;
use App\Models\Contact;
use App\Models\Section;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

class OfferComponent extends Component
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
            'recaptcha' => 'required|captcha'

        ]);
        $contact = new Application();
        $contact->user = $this->user;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->message = $this->message;
        $contact->call_source = 'Offer Form';
        $contact->save();
        $this->resetFormModal();
        $this->dispatchBrowserEvent('notify');

    }
    public function render()
    {
        $section = Section::whereActive(true)->whereOriginTitle('Offer')->first();
        $contacts = Contact::first();
        return view('livewire.front.main.offer.offer-component', compact('section', 'contacts'));
    }
}
