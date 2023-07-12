<?php

namespace App\Http\Livewire\Front\Main\Hero;

use App\Models\Hero;
use App\Models\Section;
use Livewire\Component;

class HeroComponent extends Component
{
    public function render()
    {
        $section = Section::whereActive(true)->whereOriginTitle('Hero')->first();
        $hero = Hero::whereActive(true)->orderBy('ordering','asc')->get();
        return view('livewire.front.main.hero.hero-component', compact('section', 'hero'));
    }
}
