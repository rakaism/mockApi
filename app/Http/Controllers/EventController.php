<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEvent() {
        $events = Event::get()->all();
        
        return response()->json($events);
    }
}
