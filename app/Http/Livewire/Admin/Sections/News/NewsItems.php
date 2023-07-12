<?php

namespace App\Http\Livewire\Admin\Sections\News;

use App\Models\Blog;
use App\Models\News;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class NewsItems extends Component
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
        Blog::find($this->deletedId)->delete();
        $this->alert('warning', 'Card Deleted Successfully');
    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Blog::find($item['value'])->update(['ordering' => $item['order']]);
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

        $items = Blog::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.sections.news.news-items',compact('items'))->extends('layouts.admin');
    }
}
