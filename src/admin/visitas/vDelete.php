<?php
    include_once('../connect.php');
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

        $id = $_GET['id'];
        $results = mysqli_query($conn, "SELECT * FROM visitas where id_visitas = $id");
    ?>

    <div class="container">
        <div class="card">

        <table class="table table-striped">
                <thead class="thead-Primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Asisstente</th>
                        <th scope="col">Membro</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($results)) { 
                            $id_visita = $row['id_visitas'];
                            $assistente = $row['fk_assistente'];
                            $membro = $row['fk_membro'];
                            $cep = $row['cep_visita'];
                            $estado = $row['estado_visita'];
                            $cidade = $row['cidade_visita'];
                            $data_visita = $row['data_visita'];
                            $hora_visita = $row['hora_visita'];

                            // Retorna dados da chave estrangeira
                            $results_assistente = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE id_usuario = $assistente");
                            $row_assistente     = mysqli_fetch_array($results_assistente);

                            $results_membro = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE id_usuario = $membro");
                            $row_membro     = mysqli_fetch_array($results_membro);

                            $data_visita = DateTime::createFromFormat("Y-m-d", $row['data_visita']);
                            $hora_visita = DateTime::createFromFormat("H:i:s",$row['hora_visita']);
                        ?>
                        <tr>
                            <td><?=$id_visita?></td>
                            <td><?=$row_assistente['nome_usuario']?></td>
                            <td><?=$row_membro['nome_usuario']?></td>
                            <td><?=$cep?></td>
                            <td><?=$estado?></td>
                            <td><?=$cidade?></td>
                            <td><?=$data_visita->format("d/m/Y");?></td>
                            <td><?=$hora_visita->format("H:i");?></td>

                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
                        
            <div class="d-flex justify-content-between align-items-center alert alert-danger container" role="alert" style="width: 90%;">
                Deseja remover a visita?
            <br>
            <div>
                
                <form action="vdelete.php?id=<?=$id?>" method="post">
                    <a type="button" href="vread.php" class="btn btn-primary">Voltar</a>
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
        $sql = "DELETE FROM visitas WHERE id_visitas = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Visita deletada!')</script>";
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