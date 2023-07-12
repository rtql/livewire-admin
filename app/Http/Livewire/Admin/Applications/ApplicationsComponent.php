<?php

namespace App\Http\Livewire\Admin\Applications;

use App\Models\_Application;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicationsComponent extends Component
{
    use LivewireAlert,WithPagination,AuthorizesRoleOrPermission;
    public  $currentPage = 1, $searchTerm,  $ordering;

    public function mount()
    {
//        $this->authorizeRoleOrPermission('message-list');

    }

    public function seen($id)
    {
        $contact = _Application::find($id);
        $contact->seen = true;
        $contact->save();
    }

    public function delete($id)
    {
        _Application::find($id)->delete();
        $this->alert('error', 'Application Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
    public function render()
    {
        $query = '%'.$this->searchTerm.'%';

        $items = _Application::orderBy('created_at','desc')->paginate(100);

        return view('livewire.admin.applications.applications-component',compact('items'))->extends('layouts.admin');
    }
}