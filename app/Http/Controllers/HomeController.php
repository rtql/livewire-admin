<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->to(route('inbox.index'));
    }

    public function checkout()
    {
        $room = Room::whereId(booking_room_id())->first();
        if (!$room){
            return redirect()->to('/');
        }
        return view('frontend.forms.checkout',compact('room'));
    }
}
