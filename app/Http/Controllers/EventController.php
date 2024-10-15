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
            $isAllDay = substr($event->start, 11) === '00:00:00' && substr($event->end, 11) === '00:00:00';
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'backgroundColor' => $event->eventContent->card_color ?? '#3788d8',
                'borderColor' => $event->eventContent->card_color ?? '#3788d8',
                'description' => $event->eventContent->description,
                'allDay' => $isAllDay,
            ];
        });

        return response()->json($formattedEvents);
    }

    public function update(Request $request)
    {
        $event = Event::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();
        
        return response()->json(true);
        // $event = Event::find($request->id);

        // $event->start = $request->start;
        // $event->end = $request->end;
        // $event->all_day = $request->allDay ?? false;


        // return response()->json(['success' => true]);

    }
}
