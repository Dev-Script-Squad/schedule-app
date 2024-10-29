@extends('layouts.default')

@section('content')
    <html lang="pt-BR">

    <head>
        <meta charset='utf-8' />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body class="bg-gray-200 z-index">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                <x-update-events-modal class="" />
            </div>

            <div id='calendar-wrap' class="ml-8">
                <div id='calendar' data-route-load-events="{{ route('calendar.loadEvents') }}"
                    data-route-update-event="{{ route('calendar.updateEvent') }}"
                    data-route-get-event="{{ route('events.show', ':id') }}"
                    data-route-delete-event="{{ route('events.remove', ':id') }}" class="w-full max-w-3xl mx-auto">
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
        var getEventRoute = calendarEl.dataset.routeGetEvent;
        var deleteEventRoute = calendarEl.dataset.routeDeleteEvent;

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

                let updateUrl = `{{ route('calendar.updateEvent', ':id') }}`.replace(':id', element
                    .event.id);

                sendEvent(updateUrl, newEvent);
            },
            eventClick: function(element) {
                let eventId = element.event.id;
                let url = getEventRoute(eventId);
                // console.log("URL da requisição:", url);
                // console.log(eventId)

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(event) {
                        console.log("Evento retornado:",
                            event);

                        $('#titleModalUpdate').text('Evento - ' + event.title ||
                            'Sem título');

                        $('#subtitleUpdate').val(event.event_content.subtitle || '');
                        $('#descriptionUpdate').val(event.event_content.description ||
                            '');
                        $('#card_colorUpdate').val(event.event_content.card_color ||
                            '');
                        $('#background_imageUpdate').not('[type="file"]').val(event
                            .event_content.background_image || '');
                        $('#card_imageUpdate').not('[type="file"]').val(event
                            .event_content.card_image || '');
                        $('#titleUpdate').val(event.title || '');
                        $('#typeUpdate').val(event.type || '');
                        $('#startUpdate').val(moment(event.start).format(
                            "YYYY-MM-DDTHH:mm"));
                        $('#endUpdate').val(moment(event.end).format(
                            "YYYY-MM-DDTHH:mm"));

                        document.getElementById('myModalUpdate').classList.remove(
                            'hidden');

                    },
                    error: function(xhr, status, error) {
                        console.error("Erro na requisição AJAX:", status, error);
                    }
                });
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

        // var getEventRoute = function(id) {
        //     return `{{ route('events.show', ':id') }}`.replace(':id', id);
        // };

        var getEventRoute = function(id) {
            return calendarEl.dataset.routeGetEvent.replace(':id', id);
        };


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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(json) {
                    if (json) {
                        // location.reload();
                        calendar.refetchEvents();
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

    #calendar {
        background-color: #FAFAFA;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1;
        max-width: 1100px;
    }

    #calendar-wrap {
        margin-top: 20px;
    }

    .fc-header-toolbar {
        background-color: #7b7878;
        color: white;
        padding: 10px;
        border-radius: 8px 8px 0 0;
        border-bottom: 2px solid #ffffff;
    }

    .fc-button {
        background-color: #2196F3;
        color: white;
        border: none;
        padding: 8px 12px;
        margin: 0 5px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .fc-button:hover {
        background-color: #1E88E5;
    }

    .fc-col-header-cell {
        background-color: #BBDEFB;
        font-weight: bold;
        border-bottom: 1px solid #90CAF9;
    }

    .fc-event-past {
        opacity: 0.5;
    }

    .fc-event:hover {
        background-color: #2E7D32;
    }

    .fc-event {
        background-color: #81C784;
        /* Verde suave */
        color: white;
        border: 1px solid #388E3C;
        border-radius: 8px;
        padding: 5px;
        transition: transform 0.2s;
    }

    .fc-event:hover {
        transform: scale(1.05);
    }


    .fc-day-today {
        background-color: #FFF176;
        border: 2px solid #FDD835;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        #calendar {
            width: 100%;
            padding: 10px;
        }

        .fc-header-toolbar {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
