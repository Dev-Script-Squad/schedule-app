<div id="myModalUpdate" aria-hidden="true" aria-labelledby="titleModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-screen bg-black bg-opacity-50">

    <div class="relative p-4 w-11/12 max-w-lg bg-white rounded-lg shadow-lg dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="titleModalUpdate"></h3>
            <button id="closeModalUpdate" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 
                hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto flex items-center justify-center 
                dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>

        <div class="p-4 md:p-5 max-h-[500px] overflow-y-auto custom-scroll">
            <form id="eventFormUpdate" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-1 sm:grid-cols-2">
                    <div class="col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Título do evento
                        </label>
                        <input type="text" name="title" id="titleUpdate" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                    </div>

                    <div class="col-span-2">
                        <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Subtítulo
                        </label>
                        <input type="text" name="subtitle" id="subtitleUpdate" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                    </div>

                    <div class="col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tipo do Evento
                        </label>
                        <select name="type" id="typeUpdate" required
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
                        <textarea name="description" id="descriptionUpdate" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                                 border-gray-300 dark:bg-gray-600 dark:border-gray-500 dark:text-white"></textarea>
                    </div>

                    <div>
                        <label for="start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Data de Início
                        </label>
                        <input type="datetime-local" name="start" id="startUpdate" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <div>
                        <label for="end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Data de Término
                        </label>
                        <input type="datetime-local" name="end" id="endUpdate" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <div class="col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagem de fundo do evento
                        </label>
                        <input type="file" name="background_image" id="background_imageUpdate" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg 
                                   cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none 
                                   dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Aceitamos arquivos PNG, JPG ou GIF.</p>
                        <div id="imageBackgroundPreview" class="w-64 h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Nenhuma imagem</span>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Cor do Evento
                        </label>
                        <input type="color" name="card_color" id="card_colorUpdate" value="#ffff"
                            class="block w-full h-10 rounded-lg border border-gray-300 cursor-pointer 
                                   bg-gray-50 dark:bg-gray-600 dark:border-gray-500 focus:outline-none">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Escolha uma cor que represente o
                            evento.</p>
                    </div>

                    <div class="col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagem do cartão do evento
                        </label>
                        <input type="file" name="card_image" id="card_imageUpdate" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg 
                                   cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none 
                                   dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Aceitamos arquivos PNG, JPG ou GIF.
                        </p>
                        <div id="imageCardPreview" class="w-64 h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Nenhuma imagem</span>
                        </div>
                    </div>
                </div>


                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2.5">
                    Atualizar evento
                </button>
            </form>

            <div class="event-delete">
                <form id="deleteEventForm" action="" method="POST" 
                    onsubmit="return confirm('Tem certeza que deseja deletar?');">

                    <input type="hidden" name="event_id" id="eventIdForDelete">

                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-red-600 text-white rounded px-4 py-2">Deletar evento</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('closeModalUpdate').onclick = function() {
        document.getElementById('myModalUpdate').classList.add('hidden');
    }
</script>

<style>
    .custom-scroll::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 50px;
    }

    .custom-scroll::-webkit-scrollbar-thumb {
        background-color: #c4c4c4;
        border-radius: 50px;
    }

    .custom-scroll::-webkit-scrollbar-thumb:hover {
        background-color: #a0a0a0;
    }

    .custom-scroll {
        scrollbar-width: thin;
        scrollbar-color: #c4c4c4 #f1f1f1;
    }

    input[type="file"]::file-selector-button {
        background-color: #1d4ed8;
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: #2563eb;
    }
</style>
