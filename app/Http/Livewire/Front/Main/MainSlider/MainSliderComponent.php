<?php

namespace App\Http\Livewire\Front\Main\MainSlider;

use App\Models\Slider;
use Livewire\Component;

class MainSliderComponent extends Component
{
    public function render()
    {   
        $items = Slider::whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.main.main-slider.main-slider-component', compact('items'));
    }
}
