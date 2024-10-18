<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventContent;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'event_content_id' => 'required|exists:event_content,id',
            'type' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        Event::create($validated);

        return redirect()->back()->with('success', 'Evento criado com sucesso!');
    }

    public function update(Request $request)
    {
        $event = Event::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(true);
    }
}
