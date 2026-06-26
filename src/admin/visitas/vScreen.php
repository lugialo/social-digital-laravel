<?php
    //include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
    include_once("../connect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

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
    ?>

    <form method="POST" action="vscreen.php" style="width: 60%; margin: auto;">
    
        <div style="display:flex; align-items:center; justify-content:space-between">
            <h3>Nova visita</h3>
            <a href="vread.php" style="margin-bottom: 10px;" class="btn btn-outline-primary">Voltar</a>
        </div>

        <hr><br>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputEstado">Assistente social</label>
                <select id="visitantevi" name="visitantevi" class="form-control">
                
                    <?php
                        $results1 = mysqli_query($conn, "SELECT id_usuario, nome_usuario FROM usuarios where fk_tipo = 2");

                        while ($row = mysqli_fetch_array($results1)) {
                            echo '<option value="' . $row['id_usuario'] . '">' . $row['nome_usuario'] . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="inputEstado">Membro</label>
                <select id="visitantevi" name="membrovi" class="form-control">
                    <?php
                        $results2 = mysqli_query($conn, "SELECT id_usuario, nome_usuario FROM usuarios where fk_tipo = 3");

                        while ($row = mysqli_fetch_array($results2)) {
                            echo '<option value="' . $row['id_usuario'] . '">' . $row['nome_usuario'] . '</option>';
                        }
                        
                        date_default_timezone_set('America/Sao_Paulo');
                    ?>
                </select>

            </div>

            <div class="form-group col-md-2">
                <label for="inputPassword4">Data</label>
                <input class="form-control" type="date" name="dataVi" id="dataVi" value='<?php echo date("Y-m-d"); ?>' required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Hora</label>
                <input class="form-control" type="time" name="horaVi" id="horaVi" value='<?php echo date("H:i"); ?>' required>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Observações</label>
                <textarea class="form-control" name="obsVi" id="obsVi" cols="30" rows="6" required></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Descrição</label>
                <textarea class="form-control" name="descVi" id="descVi" cols="30" rows="6" required></textarea>
            </div>
        </div>

        <form method="get" action=".">
        
        <div class="form-row">
        
        <div class="form-group col-md-3">
                <label>CEP</label>
                <input placeholder="CEP" class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9" onchange="pesquisacep(this.value);" />
            </div>

                <div class="form-group col-md-1">
                    <label>Estado</label>
                    <input class="form-control" name="estado" placeholder="UF" required id="uf" size="2" />    
                </div>
                
                <div class="form-group col-md-8">
                    <label>Cidade</label>
                    <input class="form-control" name="cidade" id="cidade" placeholder="Cidade" required id="cidade" size="40" />
                </div>

                <div class="form-group col-md-6">
                    <label>Bairro</label>
                    <input class="form-control" name="bairro" type="text" placeholder="Bairro" required id="bairro" size="40" />
                </div>

                <div class="form-group col-md-6">
                    <label>Rua</label>
                    <input class="form-control" name="rua" type="text" placeholder="Rua" required id="rua" size="60" />
                </div>
            </div>
            <button type="submit" name="sbmt" class="btn btn-primary col-md-12">Cadastrar</button>
        </form>
    </form>

    <?php
    
            
            if(isset($_POST['sbmt'])){
                include_once('vcreate.php');
                echo "<script>alert('Visita adicionada!')</script>";
            }
    ?>

    <!-- Adicionando Javascript -->
    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('ibge').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
                document.getElementById('ibge').value = (conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";
                    document.getElementById('ibge').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        }
    </script>


    <!-- Inicio do formulario -->
    <form method="get" action=".">
        <input name="ibge" type="hidden" id="ibge" size="8" /></label><br />
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>