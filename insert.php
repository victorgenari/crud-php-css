<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo Dados</title>
    <script src="./jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css-particular.css">
</head>

<body>

        <div class="container-insert">

            <div class="registration-insert">
                <h1>Registration</h1>
                <div class="linha-registration"></div>
            </div>

            <div class="label-input">
                <label class="label-insert">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome" class="just-inputs">
            </div>

            <div class="label-input">
                <label class="label-insert">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="Conta de email" class="just-inputs">
            </div>

            <div class="label-input">
                <label class="label-insert">Cidade:</label>
                <input type="text" name="cidade" id="cidade" placeholder="Sua cidade" class="just-inputs">
            </div>

            <div class="label-input">
                <label class="label-insert">Celular:</label>
                <input type="text" name="celular" id="celular" placeholder="Número de contato" class="just-inputs">
            </div>

            <div class="label-input">
                <button class="btn-cadastrar" type="button" onclick="cadastrar()">Cadastrar</button>
                <a href="index.php" class="btn-cancelar">Cancelar</a>
            </div>

        </div>

    <script>

        function cadastrar() {

            var enviando_nome   = $("#nome").val();
            var enviando_email  = $("#email").val();
            var enviando_cidade = $("#cidade").val();
            var enviando_celular = $("#celular").val();

            if (!enviando_nome) {
                alert("Nome inválido!")
                return false
            }

            if (!enviando_email) {
                alert("Email inválido!")
                return false
            }

            if (!enviando_cidade) {
                alert("Cidade inválida!")
                return false
            }

            if (!enviando_celular) {
                alert("Celular inválido!")
                return false
            }

            $.ajax ({
                url: "./functions.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    operacao: 'INSERIR',
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
                success: function() {
                    return false
                },
                complete: function(response) {
                    if ( response["responseJSON"]["error"] === false ) {
                        alert("Cadastro realizado!")
                        window.location.href = 'insert.php'
                    } else {
                        alert("Erro ao cadastrar!")
                    }
                    return false
                }
            })
        }

    </script>
</body>
</html>