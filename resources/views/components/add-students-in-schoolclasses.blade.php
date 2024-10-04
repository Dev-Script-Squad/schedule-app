<div class="add-students mb-4">
    <button onclick="openModal()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
        Adicionar Alunos à turma
    </button>
</div>

<div id="addStudentModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Adicionar Alunos à Turma</h2>
            <button onclick="closeModal()" class="text-gray-600 hover:text-gray-800">&times;</button>
        </div>
        <form action="{{ route('schoolclass.addStudents', $schoolclass->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="students" class="block text-gray-700 text-sm font-bold mb-2">Selecione os Alunos:</label>
                <select name="students[]" id="students" multiple
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($availableStudents as $student)
                        <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Adicionar Alunos
                </button>
                <button type="button" onclick="closeModal()"
                    class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function openModal() {
        document.getElementById('addStudentModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('addStudentModal').classList.add('hidden');
    }
</script>

{{-- 
<div class="add-students mb-4">
    <button onclick="openModal()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
        Adicionar Alunos à Turma
    </button>
</div>

<div id="addStudentModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white w-full max-w-2xl p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Adicionar Alunos à Turma</h2>
            <button onclick="closeModal()" class="text-gray-600 hover:text-gray-800">X</button>
        </div>

        <div class="flex space-x-4">
            <div class="w-1/2 bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-bold mb-2">Alunos Disponíveis</h3>
                <ul id="available-students" class="min-h-[200px] bg-white border p-2 rounded">
                    @foreach ($availableStudents as $student)
                        <li id="student-{{ $student->id }}" draggable="true"
                            ondragstart="event.dataTransfer.setData('studentId', {{ $student->id }})"
                            class="p-2 mb-2 bg-blue-200 rounded cursor-pointer">
                            {{ $student->user->name }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="w-1/2 bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-bold mb-2">Alunos na Turma</h3>
                <ul id="class-students" class="min-h-[200px] bg-white border p-2 rounded" ondrop="dropStudent(event)"
                    ondragover="allowDrop(event)">
                </ul>
            </div>
        </div>

        <form action="{{ route('schoolclass.addStudents', $schoolclass->id) }}" method="POST" id="add-students-form">
            @csrf
            <input type="hidden" name="students" id="students-input" value="">
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Adicionar Alunos
                </button>
                <button type="button" onclick="closeModal()"
                    class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    console.log('Script carregado');

    function openModal() {
        console.log('Abrindo modal');
        document.getElementById('addStudentModal').classList.remove('hidden');
    }

    function closeModal() {
        console.log('Fechando modal');
        document.getElementById('addStudentModal').classList.add('hidden');
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function dropStudent(event) {
        event.preventDefault();
        var studentId = event.dataTransfer.getData('studentId');
        var studentElement = document.getElementById('student-' + studentId);

        if (studentElement) {
            var classStudentsList = document.getElementById('class-students');
            var clonedStudentElement = studentElement.cloneNode(true);
            clonedStudentElement.id = 'class-student-' + studentId; // Mudar o ID do aluno na turma
            classStudentsList.appendChild(clonedStudentElement);

            var studentsInput = document.getElementById('students-input');
            var selectedStudents = studentsInput.value ? studentsInput.value.split(',') : [];
            if (!selectedStudents.includes(studentId)) {
                selectedStudents.push(studentId);
                studentsInput.value = selectedStudents.join(',');
            }

            studentElement.remove();
            console.log('Aluno adicionado:', studentId);
        }
    }
</script> --}}
