<?php

namespace App\Http\Livewire\Front\Components;

use App\Models\Media;
use Livewire\Component;

class PhotosComponent extends Component
{
    public $photos;
    public $page;

    public function photoSelected($id)
    {
        $selected = Media::whereId($id)->first();
        $this->dispatchBrowserEvent('mediaSelected',
         [
            'id' => $selected->id,
            'image' => $selected->getFile(),
        ]);

    }
    public function render()
    {
        return view('livewire.front.components.photos-component');
    }
}
