{{-- @extends('layouts.default')

@section('content')
    <html>

    <head>
        <meta charset='utf-8' />


    </head>

    <body>
        <div id='wrap'>
            <div id='external-events'>
                <h4>Draggable Events</h4>
                <div id='external-events-list'>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>My Event 1</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>My Event 2</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>My Event 3</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>My Event 4</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>My Event 5</div>
                    </div>
                </div>

                <p>
                    <input type='checkbox' id='drop-remove' />
                    <label for='drop-remove'>remove after drop</label>
                </p>
                <x-add-register-modal />
            </div>

            <div id='calendar-wrap'>
                <div id='calendar' data-route-load-events="{{ route('calendar.loadEvents') }}">
                </div>
            </div>

        </div>
    </body>

    </html>
@endsection

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src='{{ asset('assets/fullcalendar/packages/core/locales-all.global.js') }}'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var containerEl = document.getElementById('external-events-list');
        new FullCalendar.Draggable(containerEl, {
            itemSelector: '.fc-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText.trim()
                }
            }
        });

        var calendarEl = document.getElementById('calendar');
        var loadEventsRoute = calendarEl.dataset.routeLoadEvents;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locale: 'pt-br',
            navLinks: true,
            eventLimit: true,
            selectable: true,
            editable: true,
            droppable: true,
            events: loadEventsRoute,
            drop: function(arg) {
                if (document.getElementById('drop-remove').checked) {
                    arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                }
            },
            eventDrop: function(event) {
                console.log('Evento movido:', event);
            },
            eventClick: function(event) {
                console.log('Evento clicado:', event);
            },
            eventResize: function(event) {
                console.log('Evento redimensionado:', event);
            },
            select: function(info) {
                console.log('Selecionado:', info);
            }
        });

        calendar.render();

    });

</script>

<style>
    body {
        margin-top: 40px;
        font-size: 14px;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        background-color: #666;
    }

    #external-events {
        position: fixed;
        left: 20px;
        top: 20px;
        width: 150px;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
        text-align: left;
    }

    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }

    #external-events .fc-event {
        margin: 3px 0;
        cursor: move;
    }

    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }

    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }

    #calendar-wrap {
        margin-left: 200px;
    }

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }
</style> --}}
@extends('layouts.default')

@section('content')
    <html lang="pt-BR">

    <head>
        <meta charset='utf-8' />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body class="bg-gray-200 z-index">

        <div id='wrap' class="">
            <div id='external-events' class="bg-gray-300 p-4 rounded-lg shadow-lg ml-[100px] mr-[75px] mb-5">
                <h4 class="text-lg font-semibold mb-2">Eventos</h4>
                <div id='external-events-list'>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>voslei</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>bolinha</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>natação</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>oração coletiva</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>estudar</div>
                    </div>
                </div>

                <p class="mt-4">
                    <input type='checkbox' id='drop-remove' class="mr-2" />
                    <label for='drop-remove'>remove after drop</label>
                </p>
                
                <x-add-events-modal class="" />
            </div>

            <div id='calendar-wrap' class="ml-8">
                <div id='calendar' data-route-load-events="{{ route('calendar.loadEvents') }}"
                    data-route-update-event="{{ route('calendar.updateEvent') }}" class="w-full max-w-3xl mx-auto">
                </div>
            </div>

        </div>
    </body>

    </html>
@endsection

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script src='{{ asset('assets/fullcalendar/packages/core/locales-all.global.js') }}'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var containerEl = document.getElementById('external-events-list');
        new FullCalendar.Draggable(containerEl, {
            itemSelector: '.fc-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText.trim()
                }
            }
        });

        var calendarEl = document.getElementById('calendar');
        var loadEventsRoute = calendarEl.dataset.routeLoadEvents;
        var updateEventsRoute = calendarEl.dataset.routeUpdateEvent;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locale: 'pt-br',
            navLinks: true,
            eventLimit: true,
            selectable: true,
            editable: true,
            droppable: true,
            eventResizableFromStart: true,
            events: loadEventsRoute,
            updateEventsRoute,
            drop: function(arg) {
                if (document.getElementById('drop-remove').checked) {
                    arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                }
            },
            eventDrop: function(element) {
                let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

                let newEvent = {
                    _method: 'PUT',
                    id: element.event.id,
                    start: start,
                    end: end
                };

                sendEvent(updateEventsRoute, newEvent);
            },
            eventClick: function(event) {
                console.log('Evento clicado:', event);
            },
            eventResize: function(element) {
                let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

                let newEvent = {
                    _method: 'PUT',
                    id: element.event.id,
                    start: start,
                    end: end,
                };

                sendEvent(updateEventsRoute, newEvent);
            },
            select: function(info) {
                console.log('Selecionado:', info);
            }
        });

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function sendEvent(route, data_) {
            $.ajax({
                url: route,
                data: data_,
                method: 'POST',
                dataType: 'json',
                success: function(json) {
                    if (json) {
                        location.reload()
                    }
                }
            });
        }

        calendar.render();
    });
</script>

<style>
    body {
        margin-top: 40px;
        font-size: 14px;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }

    #external-events .fc-event {
        margin: 3px 0;
        cursor: move;
    }

    #calendar-wrap {
        /* margin-left: 20px; */
    }

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }
</style>
