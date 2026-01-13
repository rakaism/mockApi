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

    public function getEventDetail($id) {
        $event = Event::findOrFail($id);

        if (!$event) {
            return response()->json(
                ['msg', 'Event tidak ditemukan.'], 404
            );
        }

        return response()->json(
            $event, 200
        );
    }
}
