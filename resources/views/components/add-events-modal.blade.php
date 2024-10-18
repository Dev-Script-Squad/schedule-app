<button id="openModal" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
    focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm 
    px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Adicionar Evento
</button>

<div id="myModal" tabindex="-1" aria-hidden="true" aria-labelledby="titleModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-screen bg-black bg-opacity-50">

    <div class="relative p-4 w-11/12 max-w-lg max-h-full">
        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="titleModal">
                    Novo Evento
                </h3>
                <button id="closeModal" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                    rounded-lg text-sm w-8 h-8 ms-auto flex items-center justify-center 
                    dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form id="eventForm" action="{{ route('events.store') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1 sm:grid-cols-2">
                    <div class="col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Título do evento
                        </label>
                        <input type="text" name="title" id="title" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                    </div>
                    <div class="col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tipo do Evento
                        </label>
                        <select name="type" id="type" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="reunião">Reunião</option>
                            <option value="aula">Feriado</option>
                            <option value="prova">Prova</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Descrição do evento
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                                 border-gray-300 dark:bg-gray-600 dark:border-gray-500 dark:text-white"></textarea>
                    </div>
                    <div>
                        <label for="start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Data de Início
                        </label>
                        <input type="datetime-local" name="start" id="start" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <div>
                        <label for="end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Data de Término
                        </label>
                        <input type="datetime-local" name="end" id="end" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <div class="col-span-2">
                        <label for="event_content_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Conteúdo do Evento
                        </label>
                        <select name="event_content_id" id="event_content_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="1">Conteúdo 1</option>
                            <option value="2">Conteúdo 2</option>
                        </select>
                    </div>
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2.5">
                    Criar novo evento
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('openModal').onclick = function() {
        document.getElementById('myModal').classList.remove('hidden');
    }

    document.getElementById('closeModal').onclick = function() {
        document.getElementById('myModal').classList.add('hidden');
    }
</script>
