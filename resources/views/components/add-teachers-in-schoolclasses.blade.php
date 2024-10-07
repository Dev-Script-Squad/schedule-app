<div class="add-teachers mb-4">
  <button onclick="openTeacherModal()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
      Adicionar Professores à turma
  </button>
</div>

<div id="addTeacherModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
  <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
      <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold">Adicionar Professores à Turma</h2>
          <button onclick="closeTeacherModal()" class="text-gray-600 hover:text-gray-800">&times;</button>
      </div>
      <form action="{{ route('schoolclass.addTeachers', $schoolclass->id) }}" method="POST">
          @csrf
          <div class="mb-4">
              <label for="teachers" class="block text-gray-700 text-sm font-bold mb-2">Selecione os Professores:</label>
              <select name="teachers[]" id="teachers" multiple
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  @foreach ($availableTeachers as $teacher)
                      <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="flex justify-end">
              <button type="submit"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                  Adicionar Professores
              </button>
              <button type="button" onclick="closeTeacherModal()"
                  class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                  Cancelar
              </button>
          </div>
      </form>
  </div>
</div>

<script>
  function openTeacherModal() {
      document.getElementById('addTeacherModal').classList.remove('hidden');
  }

  function closeTeacherModal() {
      document.getElementById('addTeacherModal').classList.add('hidden');
  }
</script>
