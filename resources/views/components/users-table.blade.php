@if ($users->isEmpty())
    <p>Não há usuários cadastrados.</p>
@else
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if (!isset($role) || (isset($role) && $user->role === $role))
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}">Ver Detalhes</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endif
<style scoped>
    /* Container para toda a página */
    .container {
        padding: 20px;
        margin: 0 auto;
        max-width: 1000px;
    }

    /* Tabela com responsividade */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    /* Estilo dos links e botões */
    a {
        color: #3490dc;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    button.logout {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    button.logout:hover {
        background-color: #c0392b;
    }

    /* Responsividade */
    @media (max-width: 768px) {

        th,
        td {
            font-size: 0.9rem;
            padding: 8px;
        }
    }

    @media (max-width: 480px) {
        table {
            font-size: 0.8rem;
        }

        .container {
            padding: 10px;
        }
    }
</style>
