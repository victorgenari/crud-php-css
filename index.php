<?php

include "db.php";

$sql = "SELECT * FROM `users`";

$dados = mysqli_query($dbconnection, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Dados</title>
    <script src="./jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css-particular.css">
</head>

<body>

    <div class="principal-index">
        <table class="table-index">

            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>E-mail:</th>
                    <th>Cidade:</th>
                    <th>Celular:</th>
                    <th>Funções:</th>
                </tr>
            </thead>

            <tbody>
                <?php

                    while ( $linhadados = mysqli_fetch_assoc($dados) ) {
                        
                        $id     = $linhadados['id'];
                        $nome   = $linhadados['nome'];
                        $email  = $linhadados['email'];
                        $cidade = $linhadados['cidade'];
                        $celular = $linhadados['celular'];

                        print "<tr class='line-efect-index'>
                            <td>$nome</td>
                            <td>$email</td>
                            <td>$cidade</td>
                            <td>$celular</td>
                            <td>
                                <button class='btn-edit' type='button' onclick='editar(".$id.")'>Editar</button>
                                <button class='btn-delete' type='button' onclick='excluir(".$id.")'>Excluir</button>
                                <button class='btn-new' type='button' onclick='novo_cadastro()'>Novo Cadastro</button>
                            </td>

                        </tr>";
                    }
                ?>
            </tbody>

        </table>
    </div>
    
    <script>

        function novo_cadastro() {
            window.location.href = 'insert.php'
        }

        function editar(id) {
            var env_id = id
            // window.location.href = 'edit.php?id=' + env_id
            window.location.href = `edit.php?id=${env_id}`
        }

        function excluir(id) {

            var enviando_id = id;

            if ( confirm("Deseja realmente deletar?") ) {
                $.ajax ({
                    url: "./functions.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        operacao: 'EXCLUIR',
                        id: enviando_id,
                    },
                    async: true,
                    timeout: 20000,
                    beforeSend: function() {
                    },
                    error: function(response) {
                        return false
                    },
                    success: function (response) {
                        return false
                    },
                    complete: function (response) {
                        if ( response["responseJSON"]["error"] === false ) {
                            alert(response["responseJSON"]["msg"])
                        } else {
                            alert(response["responseJSON"]["error"])
                        }
                        window.location.href = 'index.php'
                        return false

                    }
                })
            }
        } 
    </script>

    

</body>
</html>