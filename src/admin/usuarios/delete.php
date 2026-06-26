<?php
    //include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
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

    <?php
        include_once('../header.php');
        include_once('../connect.php');
       
        $id = $_GET['id'];
        $results = mysqli_query($conn, "SELECT * FROM usuarios where id_usuario = $id");
    ?>

    <div class="container">
        <div class="card">

            <table class="table table-striped">
                <thead class="thead-Primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">RG</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Cadastro</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($results)) { 
                        $id_usuario = $row['id_usuario'];
                        $name_user = $row['nome_usuario'];
                        $cpf_user = $row['cpf_usuario'];
                        $rg_user = $row['rg_usuario'];
                        $email_user = $row['email_usuario'];
                        $dtNasc_user = DateTime::createFromFormat("Y-m-d", $row['dtNasc_usuario']);
                        $dtCad_user = DateTime::createFromFormat("Y-m-d", $row['dtCad_usuario']); 
                        $tipo_user = $row['fk_tipo'];
                    ?>
                    
                        <tr>
                            <td><?=$row['id_usuario'];?></td>
                            <td><?=$row['nome_usuario']; ?></td>
                            <td><?=$row['cpf_usuario']; ?></td>
                            <td><?=$row['rg_usuario']; ?></td>
                            <td><?=$row['email_usuario']; ?></td>
                            <td><?=$dtNasc_user->format("d/m/Y"); ?></td>
                            <td><?=$dtCad_user->format("d/m/Y");?> </td>
                            <td><?=$row['fk_tipo']; ?></td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
                        
            <div class="d-flex justify-content-between align-items-center alert alert-danger container" role="alert" style="width: 90%;">
                Deseja remover o usuário?
            <br>
            <div>
                
                <form action="delete.php" method="post">
                    <a type="button" href="read.php" class="btn btn-primary">Voltar</a>
                    <button type="submit" name="del" class="btn btn-outline-danger">Remover</button>
                </form>
            </div>
    </div>
        </div>
        <!--card-->
    </div>
    <!--container-->  
    
<?php


    if(isset($_POST['del'])){
        $sql = "DELETE FROM usuarios WHERE id_usuario = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Usuário deletado!')</script>";
        } else {
            echo "Error: " . $sql . "<br>   " . $conn->error;
        }
    } 
        
?>

    <br><br>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>