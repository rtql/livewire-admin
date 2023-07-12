<?php

namespace App\Http\Livewire\Admin\Sections\Slider;

use App\Models\Slider;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Sliders extends Component
{
    use LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;

    public $name = 'Slide', $currentPage = 1, $searchTerm,  $ordering;

    public function mount()
    {
                // $this->authorizeRoleOrPermission('slide-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Slider::find($item['value'])->update(['ordering' => $item['order']]);
        }
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
        Slider::find($this->deletedId)->delete();
        $this->alert('warning', 'Slide Deleted Successfully');
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

        $items = Slider::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.sections.slider.slider',compact('items'))->extends('layouts.admin');
    }
}
