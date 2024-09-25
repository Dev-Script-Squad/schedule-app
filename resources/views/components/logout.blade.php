<form action="{{ route('user.logout') }}" method="post">
    @csrf
    <button class="logout">Sair</button>
</form>

<style scoped>
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
</style>
