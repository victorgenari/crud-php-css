<?php

include "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE id = $id";

$dados = mysqli_query($dbconnection, $sql);

$linhadados = mysqli_fetch_assoc($dados);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Dados</title>
    <script src="./jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css-particular.css">
</head>
<body>

    <div class="container-edit">

        <h1 class="alterations-edit">
            Alterações:
            <div class="row-alterations"></div>
        </h1>

        <div class="label-input">
            <label class="label-edit">Nome:</label>
            <input class="just-inputs" type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php print $linhadados['nome'] ?>" >
        </div>

        <div class="label-input">
            <label class="label-edit">Email:</label>
            <input class="just-inputs" type="email" name="email" id="email" placeholder="Conta de email" value="<?php print $linhadados['email'] ?>" >
        </div>

        <div class="label-input">
            <label class="label-edit">Cidade:</label>
            <input class="just-inputs" type="text" name="cidade" id="cidade" placeholder="Sua cidade" value="<?php print $linhadados['cidade'] ?>" >
        </div>

        <div class="label-input">
            <label class="label-edit">Celular:</label>
            <input class="just-inputs" type="text" name="celular" id="celular" placeholder="Número de contato" value="<?php print $linhadados['celular'] ?>" >
        </div>

        <div class="label-input">
            <button class="save-btn" type="button" onclick="salvar_alteracoes(<?php print $id ?>)">Salvar Alterações</button>
            <button class="cancel-btn" type="button" onclick="cancelar()">Cancelar</button>
        </div>

    </div>

    <script>

        function cancelar() {
            window.location.href = 'index.php'
        }

        function salvar_alteracoes(id) {

            var enviando_id     = id;
            var enviando_nome   = $('#nome').val();
            var enviando_email  = $('#email').val();
            var enviando_cidade = $('#cidade').val();
            var enviando_celular = $('#celular').val();

            if ( !enviando_nome ) {
                alert("Nome inválido!")
                return false
            }

            if ( !enviando_email ) {
                alert("Email inválido!")
                return false
            }

            if ( !enviando_cidade ) {
                alert("Cidade inválida!")
                return false
            }

            if ( !enviando_celular ) {
                alert("Celular inválido!")
                return false
            }

            $.ajax ({
                url: "./functions.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    operacao: 'EDITAR',
                    id: enviando_id,
                    nome: enviando_nome,
                    email: enviando_email,
                    cidade: enviando_cidade,
                    celular: enviando_celular,
                },
                async: true,
                timeout: 20000,
                beforeSend: function() {
                },
                error: function(response) {
                    return false
                },
                success: function(response) {
                    return false
                },
                complete: function(response) {
                    if ( response["responseJSON"]["error"] === false ) {
                        alert("Dados editados!")
                        window.location.href = 'index.php'
                    } else {
                        alert("Problemas ao editar!")
                    }
                    return false
                }
            })
        }
        
    </script>

</body>
</html>