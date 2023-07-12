<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\_Page;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class SubpagesComponent extends Component
{
    use LivewireAlert, WithPagination, AuthorizesRoleOrPermission;

    public bool $active;
    public $page_id;

    public $name = 'Page', $currentPage = 1, $searchTerm,  $ordering;
    public function mount($id)
    {
        // $this->authorizeRoleOrPermission('slide-list');
        $this->page_id = $id;

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

    public function confirmed()
    {
        $page = _Page::whereId($this->deletedId)->first();
        $parentPage = _Page::whereId($page->parent_page)->first();
        if ($parentPage) {
            $parentPage->has_pages -= 1;
            $parentPage->save();
        }
        $page->delete();
        $this->alert('warning', 'Page Deleted Successfully');
    }

    public function updateOrdering($items)
    {
        foreach ($items as $item) {
            _Page::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }
    public function render()
    {
        $query = '%' . $this->searchTerm . '%';

        $items = _Page::whereParentPage($this->page_id)->orderBy('ordering', 'asc')->paginate(10);
        $parentPages = _Page::where('parent_page', '!=', null)->get();
        return view('livewire.admin.pages.subpages-component', compact('items', 'parentPages'))->extends('layouts.admin');
    }
}
