<template>
  <div class="director-dashboard">
    <h1>Diretor Dashboard</h1>
    <div class="student-list">
      <h2>Lista de Alunos</h2>
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Turma</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="student in students" :key="student.id">
            <td>{{ student.name }}</td>
            <td>{{ student.email }}</td>
            <td>{{ student.class }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      students: [],  // Lista vazia que será preenchida com os alunos
    };
  },
  methods: {
    fetchStudents() {
      // Aqui você vai chamar a API que retorna os alunos
      fetch("/api/students")
        .then((response) => response.json())
        .then((data) => {
          this.students = data; // Preenche a lista de alunos com os dados da API
        })
        .catch((error) => {
          console.error("Erro ao buscar alunos:", error);
        });
    },
  },
  mounted() {
    // Quando o componente for montado, ele chama a função para buscar os alunos
    this.fetchStudents();
  },
};
</script>

<style scoped>
.director-dashboard {
  padding: 20px;
}

.student-list table {
  width: 100%;
  border-collapse: collapse;
}

.student-list th,
.student-list td {
  border: 1px solid #ddd;
  padding: 8px;
}

.student-list th {
  background-color: #f2f2f2;
}
</style>
