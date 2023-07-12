<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\Comment;
use App\Models\_Application;
use App\Models\FastOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LeftMenu extends Component
{
    public $seenCount;
    public $careerSeenCount;
    
    protected $listeners = ['refreshLeftMenu'=>'$refresh'];

    public function mount()
    {
        $this->seenCount = User::whereSeen(false)->count();

    }

    public function render()
    {
        
        $messages = _Application::whereSeen(0)->get();
        $count = count($messages);
        $style = '';
        if ($count > 0) {
            $style = 'block';
        }
        else {
            $style = 'none';
        }
        return view('livewire.admin.supports.left-menu', compact('count', 'style'));
    }
}
