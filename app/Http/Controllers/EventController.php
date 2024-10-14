<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventContent;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function loadEvents()
    {
        $events = Event::with('eventContent')->get();
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'backgroundColor' => $event->eventContent->card_color ?? '#3788d8',
                'description' => $event->eventContent->description,
            ];
        });

        return response()->json($formattedEvents);
    }


}
