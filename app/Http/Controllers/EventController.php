<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventContent;
use Illuminate\Container\Attributes\Log;
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


    public function show(Event $event)
    {
        return response()->json($event->load('eventContent'));
    }
    
    // public function show($id)
    // {
    //     $event = Event::with('eventContent')->find($id);

    //     if (!$event) {
    //         return response()->json(['message' => 'Evento não encontrado.'], 404);
    //     }

    //     return response()->json($event);
    // }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'background_image' => 'nullable|string',
            'card_image' => 'nullable|string',
            // 'background_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            // 'card_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'type' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $eventContent = EventContent::create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'description' => $validated['description'] ?? '',
            'background_image' => $validated['background_image'] ?? null,
            'card_image' => $validated['card_image'] ?? null,
            'card_color' => $request->input('card_color', '#FFFFFF'),
        ]);

        $validated['event_content_id'] = $eventContent->id;
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
