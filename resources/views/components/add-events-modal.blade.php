<button id="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Criar Evento
</button>

<div id="myModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
  <div class="bg-white rounded shadow-lg p-6">
      <h2 class="text-xl mb-4">Criar Evento</h2>
      <form action="{{ route('student.store') }}" method="POST">
          @csrf
          <x-validation-error />
          <label for="name" class="block text-gray-700">Título:</label>
          <input type="text" name="name" class="border rounded w-full mb-4 p-2" required>

          <label for="email" class="block text-gray-700">Email:</label>
          <input type="email" name="email" class="border rounded w-full mb-4 p-2" required>

          <label for="password" class="block text-gray-700">Senha:</label>
          <input type="password" name="password" class="border rounded w-full mb-4 p-2" required>

          <div class="flex justify-end">
              <button type="button" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded mr-2" id="closeModal">Cancelar</button>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Adicionar</button>
          </div>
      </form>
  </div>
</div>

<script>
  document.getElementById('openModal').onclick = function() {
      document.getElementById('myModal').classList.remove('hidden');
      document.getElementById('myModal').classList.add('visible');
  }

  document.getElementById('closeModal').onclick = function() {
      document.getElementById('myModal').classList.add('hidden');
      document.getElementById('myModal').classList.remove('visible');
  }
</script>

