<?php
    include_once("sessao.php");

    $id = $_GET['id'];
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
        include_once("userHeader.php");
    ?>

    <div class="container">
            <form action="/pi353socialdigital/src/user/avaliacao.php?id=<?=$id?>" method="POST">
                <table class="table table-striped">
                    <thead class="thead-Primary">
                        <ul class="list-group">
                            <div class="list-group-item active" style="display:flex; align-items:center; justify-content:space-between">
                                <h4>Avaliação</h4>
                                <h5>1 - Muito ruim | 2 - Ruim | 3 - Ok | 4 - Bom | 5 - Muito bom</h5>
                            </div>
                            
                            <li class="list-group-item" style="display: flex; align-items: center; justify-content: space-between;"> 
                                <p>Nota geral para a velocidade do sistema.</p>
                                <select class="form-control-sm btn-outline-primary" name="anota" id="anota">
                                    <option value="Nota">Nota</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </li>
                            <li class="list-group-item" style="display: flex; align-items: center; justify-content: space-between;"> 
                                <p>Nota geral para a usabilidade do sistema.</p>
                                <select class="form-control-sm btn-outline-primary" name="bnota" id="bnota" style="float: right;">
                                    <option value="Nota">Nota</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </li>
                            <li class="list-group-item" style="display: flex; align-items: center; justify-content: space-between;"> 
                                <p>Nota geral para o design do sistema.</p>
                                <select class="form-control-sm btn-outline-primary" name="cnota" id="cnota" style="float: right;">
                                    <option value="Nota">Nota</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </li>
                            <li class="list-group-item" style="display: flex; align-items: center; justify-content: space-between;"> 
                                <p>Nota geral para o sistema.</p>
                                <select class="form-control-sm btn-outline-primary" name="dnota" id="dnota" style="float: right;">
                                    <option value="Nota">Nota</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </li>
                            <li class="list-group-item" style="display: flex; align-items: center; justify-content: space-between;"> 
                                <p>Nota geral para o atendimento.</p>
                                <select class="form-control-sm btn-outline-primary" name="enota" id="enota" style="float: right;">
                                    <option value="Nota">Nota</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </li>
                            <li class="list-group-item">
                            <button type="submit" name="sbmt" class="btn btn-primary col-md-12">Enviar</button>
                            </li>
                        </ul>
                    </thead>
                </table>
            </form>
    </div>


    <?php
    include_once("../admin/connect.php");

        error_reporting(0);

        $nota_a = $_POST['anota'];
        $nota_b = $_POST['bnota'];
        $nota_c = $_POST['cnota'];
        $nota_d = $_POST['dnota'];
        $nota_e = $_POST['enota'];
        $submit = $_POST['sbmt'];

        if (isset($_POST['sbmt'])) {
            include_once("nota.php");
            echo "<script>alert('Avaliação cadastrada!')</script>";
        } 

    ?>

    </main>
</body>

</html>