<?php
    include_once("sessao.php");
?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Social Digital</a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link " href="/pi353socialdigital/src/user/home.php?id=<?=$id?>">Home</a>
                </li>
                <li>
                    <a class="nav-link " href="/pi353socialdigital/src/user/avaliacao.php?id=<?=$id?>">Avaliação</a>
                </li>
                <li>
                    <a class="nav-link " href="/pi353socialdigital/src/user/perfil.php?id=<?=$id?>">Perfil</a>
                </li>
                <li>
                    <a class="nav-link " href="?sair">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>