<?php

namespace App\Http\Livewire\Admin\Sections\Transport;

use App\Models\Transport;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class TransportItems extends Component
{
    use LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;

    public $name = 'Card', $currentPage = 1, $searchTerm,  $ordering;

    
    public function mount()
    {
                // $this->authorizeRoleOrPermission('slide-list');

    }
    protected $listeners = [
        'confirmed'
    ];
    public $deletedId;
    public function delete($id)
    {   
        $this->deletedId = $id;
        $this->confirm('Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'confirmed' 
            ]);
    }

    public function confirmed() {
        Transport::find($this->deletedId)->delete();
        $this->alert('warning', 'Card Deleted Successfully');
    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Transport::find($item['value'])->update(['ordering' => $item['order']]);
        }
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

        $items = Transport::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.sections.transport.transport-items',compact('items'))->extends('layouts.admin');
    }
}
