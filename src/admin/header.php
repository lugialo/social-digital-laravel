<?php
    include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Social Digital</a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuários
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/usuarios/screen.php">Novo usuário</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/usuarios/read.php">Tabela de usuários</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Visitas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/visitas/vScreen.php">Nova visita</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/visitas/vRead.php">Tabela de visitas</a>
                    </div >
                </li>
                <li>
                    <div>
                        <a class="nav-link " href="?sair">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>