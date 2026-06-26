<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    include_once('connect.php');
    //include_once('var.php');
?>

<body>
    <h1>Social Digital - Editar</h1>
    <main>
        <div id="mid-edit">
            <fieldset>
                <form method="POST" action="edit.php">
                    <input type="hidden" id="id_user" name="id_user" value="<?=$_GET['id'];?>"/>
                    <label for="name_user">Nome</label><br>
                    <input type="text" name="nome_user" id="userName" value="<?php echo 'Nome' ?>" required><br><br>

                    <label for="email">E-mail</label><br>
                    <input type="email" name="email_user" id="userEmail" value="<?php echo 'Email' ?>" required><br><br>

                    <label for="cpf_user">CPF</label><br>
                    <input type="text" name="cpf_user" id="userCpf" value="<?php echo 'CPF' ?>" required><br><br>

                    <label for="rg_user">RG</label><br>
                    <input type="text" name="rg_user" id="userRg" value="<?php echo 'RG' ?>" required><br><br>

                    <label for="cpf_user">Celular</label><br>
                    <input type="tel" name="cel_user" id="userCel" value="<?php echo 'Celular' ?>" required><br><br>

                    <label for="rg_user">Data Nascimento</label><br>
                    <input type="date" name="dtNasc_user" id="userDtNasc" value="<?php echo 'Nascimento' ?>" required><br><br>

                    <label for="rg_user">Data Cadastro</label><br>
                    <input type="date" name="dtCad_user" id="userDtCad"  value="<?php echo date('Y-m-d'); ?>" required><br><br>

<!--
                    <label for="cpf_user">Sexo:</label><br><br>

                    <label for="masc" checked>M</label>
                    <input type="radio" name="masc_user" id="userMasc" required><br>

                    <label for="masc">F</label>
                    <input type="radio" name="fem_user" id="userFem" required><br><br>

                    <label for="tipo_user">Tipo usuário:</label><br><br>

                    <label for="admin" checked>Admin</label>z   
                    <input type="radio" name="admin_user" id="userAdmin" value="A"><br>

                    <label for="comum">Comum</label>
                    <input type="radio" name="comum_user" id="userComum" value="C"><br><br>
-->

                    <input type="submit" name="upd" value="Update">

                </form>
            </fieldset>
        </div><!--mid-->
    </main>
</body>
</html>