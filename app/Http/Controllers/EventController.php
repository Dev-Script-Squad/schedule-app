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


    // public function show(Event $event)
    // {
    //     if(request()->ajax()) {
    //         return response()->json($event->load('eventContent'));
    //     }

    //     return view('update-events-modal', compact('event'));
    //     // return response()->json($event->load('eventContent'));
    // }

    public function show(Event $event)
    {
        if (request()->ajax()) {
            return response()->json($event->load('eventContent'));
        }

        return view('components.update-events-modal', compact('event'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            // 'background_image' => 'nullable|image',
            // 'card_image' => 'nullable|image',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'card_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'type' => 'required|string',
        ]);

        if ($request->hasFile('card_image')) {
            // $cardImage = $request->card_image->move(public_path('images/events'));
            $cardImage = $request->file('card_image')->store('images/card_images', 'public');
        }
        if ($request->hasFile('background_image')) {
            // $backgroundImage = $request->background_image->move(public_path('images/events'));
            $backgroundImage = $request->file('background_image')->store('images/background_images', 'public');
        }

        $validated['user_id'] = Auth::id();

        $eventContent = EventContent::create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'description' => $validated['description'] ?? '',
            // 'background_image' => $validated['background_image'] ?? null,
            // 'card_image' => $validated['card_image'] ?? null,
            'background_image' => $backgroundImage ?? null,
            'card_image' => $cardImage ?? null,
            'card_color' => $request->input('card_color', '#FFFFFF'),
        ]);

        $validated['event_content_id'] = $eventContent->id;
        Event::create($validated);

        return redirect()->back()->with('success', 'Evento criado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id)->load('eventContent');
        $eventContent = $event->eventContent;


        $event->update([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        $eventContent->update([
            'subtitle' => $request->subtitle,
            'background_image' => $request->background_image,
            'card_color' => $request->card_color,
            'card_image' => $request->card_image,
        ]);



        return redirect()->route('calendar.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function updateDropResize(Request $request)
    {
        $event = Event::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(true);
    }

    public function remove(Event $event)
    {
        $event->delete();
        return redirect()->route('calendar.index')->with('success', 'Evento removido com sucesso!');
    }
}
