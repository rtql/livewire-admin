<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Models\_Contact;
use App\Models\_Page;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class FooterInfo extends Component

{
    use LivewireAlert,WithFileUploads;
    public  $title;
    public  $phone;
    public  $phone_res;
    public  $whatsup;
    public  $email;
    public  $address;
    public  $map;
    public  $facebook,
            $instagram,
            $linkedin,
            $pinterest,
            $youtube;

    public function mount()
    {
        $item = _Contact::whereId(1)->first();
        $page = _Page::whereRoute('contacts')->first();
        $this->title = $page->getTranslations('title');
        $this->phone = $item->phone;
        $this->phone_res = $item->phone_res;
        $this->whatsup = $item->whatsup;
        $this->email = $item->email;
        $this->address = $item->getTranslations('address');
        $this->map = $item->map;
        $this->facebook = $item->facebook;
        $this->instagram = $item->instagram;
        $this->linkedin = $item->linkedin;
        $this->pinterest = $item->pinterest;
        $this->youtube = $item->youtube;

    }

    public function update()
    {
        $contactPage = _Contact::find(1);
        $contactPage->phone = $this->phone;
        $contactPage->phone_res = $this->phone_res;
        $contactPage->whatsup = $this->whatsup;
        $contactPage->email = $this->email;
        $contactPage->address = $this->address;
        $contactPage->map = $this->map;
        $contactPage->facebook = $this->facebook;
        $contactPage->instagram = $this->instagram;
        $contactPage->linkedin = $this->linkedin;
        $contactPage->pinterest = $this->pinterest;
        $contactPage->youtube = $this->youtube;
        $contactPage->save();
        $page = _Page::whereRoute('contacts')->first();
        $page->title = $this->title;
        $page->save();
        $this->alert('success','Contacts has been updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.contacts.footer-info')->extends('layouts.admin');
    }
}