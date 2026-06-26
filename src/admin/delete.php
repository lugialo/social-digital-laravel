<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Social Digital</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Social Digital</a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/screen.php">Novo</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/read.php">Tabela de usuários</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/read.php">Relatório</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dashboard
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Geral</a>
                        <a class="dropdown-item" href="#">Visitas</a>
                        <a class="dropdown-item" href="#">Gráficos</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contato
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mensagens</a>
                        <a class="dropdown-item" href="#">Feedbacks</a>
                        <a class="dropdown-item" href="#">Gráficos</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>
    <div class="d-flex justify-content-between align-items-center alert alert-danger container" role="alert" style="width: 25%;">
        Remover usuário?
        <br>
        <div>
            <form action="delete.php" method="post">
                <a type="button" href="/pi353socialdigital/src/admin/read.php" class="btn btn-outline-primary">Voltar</a>
                <a type="button" href="/pi353socialdigital/src/admin/read.php" class="btn btn-danger">Remover</a>
            </form>
        </div>
    </div>

    <?php
    include_once('connect.php');
    $id = $_GET['id'];
    $del = $_POST['del'];

    $sql = "DELETE FROM usuarios WHERE id_usuario = $id";

/*
    if (isset($del)) {
        if ($conn->query($sql) === TRUE) {
            echo "Delete successfully <br>";
            echo $sql;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        mysqli_close($conn);
    }
    ?>
*/
        if ($conn->query($sql) === TRUE) {
            echo "Delete successfully <br>";
            echo $sql;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        mysqli_close($conn);
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>