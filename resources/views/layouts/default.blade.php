<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Menu</h2>
        </div>
        <ul class="sidebar-nav">
            <li><a href="/calendar">Calendário</a></li>
            <li><a href="/students">Alunos</a></li>
            <li><a href="/teachers">Professores</a></li>
            <li><a href="/school-classes">Turmas</a></li>
            <li><a href="/users">Usuários</a></li>
          </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>

</html>

<style scoped>
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #2c3e50;
        color: white;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        transition: width 0.3s ease;
    }

    .sidebar-header {
        padding: 10px;
        font-size: 1.5rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-nav {
        list-style-type: none;
        padding: 0;
        margin-top: 20px;
    }

    .sidebar-nav li {
        margin: 15px 0;
    }

    .sidebar-nav a {
        color: white;
        text-decoration: none;
        font-size: 1.1rem;
        padding: 10px 15px;
        display: block;
        transition: background-color 0.3s ease;
        border-radius: 4px;
    }

    .sidebar-nav a:hover {
        background-color: #34495e;
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100px;
        }

        .main-content {
            margin-left: 100px;
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            width: 60px;
        }

        .sidebar-header {
            font-size: 1rem;
        }

        .sidebar-nav a {
            font-size: 0.9rem;
            padding: 5px 10px;
        }

        .main-content {
            margin-left: 60px;
        }
    }
</style>
