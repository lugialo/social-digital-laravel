<?php
//Chamando todos os arquivos necessários 
include_once("connect.php");
$results = mysqli_query($conn, "SELECT * FROM usuarios");
?>

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

    <div class="container">
        <div class="card">
            <div class="d-flex justify-content-between d-flex align-items-center" style="padding: 10px;">
                <div>
                    <form action="search.php" method="post" class="d-flex justify-content-around d-flex align-items-center">
                        <input class= "form-control mr-sm-2" type="search" placeholder="Pesquisar" name="buscar" id="buscar" required>
                        <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sbmt" id="sbmt" value="Buscar">
                    </form>
                </div>
                <form method="post" action="search.php">
                    <a class="btn btn-success " style="font-size: 16px; font-weight:500;" href="/pi353socialdigital/src/admin/screen.php">NOVO</a>
                </form>
            </div>

            <table class="table table-striped">
                <thead class="thead-Primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">RG</th>
                        <th scope="col">Email</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Cadastro</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['nome_usuario']; ?></td>
                            <td><?php echo $row['cpf_usuario']; ?></td>
                            <td><?php echo $row['rg_usuario']; ?></td>
                            <td><?php echo $row['email_usuario']; ?></td>
                            <td><?php echo $row['celular_usuario']; ?></td>
                            <td><?php echo $row['dtNasc_usuario']; ?></td>
                            <td><?php echo $row['dtCad_usuario']; ?></td>

                            <td>
                                <a name="edit" href="screenEdit.php?id=<?= $row['id_usuario']; ?>" class="edit_btn"><img src="/pi353socialdigital/IMAGES/editar.png" alt="edit"></a>
                                <a name="del" href="delete.php?id=<?= $row['id_usuario']; ?>" class="del_btn"><img src="/pi353socialdigital/IMAGES/lixo.png" alt="trash"></a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>

            </table>

        </div>
        <!--card-->
    </div>
    <!--container-->

    <form>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>