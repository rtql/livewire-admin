<?php

use Illuminate\Support\Facades\Route;

/* Special Login Route for Admin  */

Route::prefix('admin')->get('login',[\App\Http\Livewire\Admin\LoginComponent::class,'index'])->name('admin.login');

/* Special Routes for Admin  */

Route::prefix('admin')->name('admin.')->middleware(['auth','has_role'])->group(function(){

    /* Special Routes for Dashboard  */

    Route::get('dashboard',\App\Http\Livewire\Admin\Applications\ApplicationsComponent::class)->name('route');


    /* Special Routes for profile */

    Route::get('change-password',[\App\Http\Controllers\Admin\ProfileController::class,'changePassword'])->name('change.password');


    /* Special Support Routes  */

    Route::get('trashed/{model}/{path}',\App\Http\Livewire\Admin\Supports\TrashedItems::class)->name('trashed');

    /* Special Route for image upload from CKEDITOR  */

    Route::post('ckeditor/upload', \App\Http\Controllers\Admin\CkeditorController::class)->name('ckeditor.upload');

    /* Special Routes for Applications  */

    Route::get('applications',\App\Http\Livewire\Admin\Applications\ApplicationsComponent::class)->name('applications');
    Route::get('applications/edit/{id}',\App\Http\Livewire\Admin\Applications\Read::class)->name('applications.read');

    /* Special Routes for Main Page  */

    Route::get('main',\App\Http\Livewire\Admin\Sections\Edit::class)->name('sections');
    Route::get('sections',\App\Http\Livewire\Admin\Sections\SectionsComponent::class)->name('landing.items');

    
    /* Special Routes for Other Page  */

    Route::get('pages',\App\Http\Livewire\Admin\Pages\PagesComponent::class)->name('pages');
    Route::get('subpages/{id}',\App\Http\Livewire\Admin\Pages\SubpagesComponent::class)->name('subpages');
    Route::get('pages/contacts',\App\Http\Livewire\Admin\Contacts\FooterInfo::class)->name('pages.contacts');

});

