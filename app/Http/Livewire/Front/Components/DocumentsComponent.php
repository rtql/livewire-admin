<?php

namespace App\Http\Livewire\Front\Components;

use App\Models\Certificate;
use Livewire\Component;

class DocumentsComponent extends Component
{   public $documents;
    public $certificates;
    public $licences;
    public $page;

    public function docSelected($id)
    {
        $selected = Certificate::whereId($id)->first();
        $this->dispatchBrowserEvent('mediaSelected',
         [
            'id' => $selected->id,
            'image' => $selected->getFile(),
        ]);

    }
    public function render()
    {
        return view('livewire.front.components.documents-component');
    }
}
