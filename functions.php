<?php

// Função INSERIR

include "db.php";

if ( $_POST["operacao"] === "INSERIR" ) {

    $sql = "INSERT INTO users (nome, email, cidade, celular) VALUES ('".$_POST['nome']."', '".$_POST['email']."', '".$_POST['cidade']."', '".$_POST['celular']."')";

    if ( mysqli_query($dbconnection, $sql) ) {
        $response["error"] = false;
        $response["msg"] = "Cadastro realizado!";
    } else {
        $response["error"] = true;
        $response["msg"] = "Problemas ao cadastrar!";
    }
    return print utf8_encode(json_encode($response));
}

// Função EDITAR

if ( $_POST["operacao"] === "EDITAR" ) {

    $id     = $_POST['id'];
    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $cidade = $_POST['cidade'];
    $celular = $_POST['celular'];

    $sql = "UPDATE users SET `nome` = '$nome', `email` = '$email', `cidade` = '$cidade', `celular` = '$celular' WHERE id = $id";

    $resultado = mysqli_query($dbconnection, $sql);

    if ( $resultado === true ) {
        $response["error"] = false;
        $response["msg"] = "Dados editados!";
    } else {
        $response["error"] = true;
        $response["msg"] = "Problemas ao editar!";
    }
    return print utf8_encode(json_encode($response));
}

// Função EXCLUIR

if ( $_POST["operacao"] === "EXCLUIR" ) {
    $id = $_POST['id'];

    $sql = "DELETE FROM `users` WHERE id = $id";

    $resultado = mysqli_query($dbconnection, $sql);

    if ( $resultado !== true ) {
        $response["error"] = true;
        $response["msg"] = "Problemas ao excluir";
    } else {
        $response["error"] = false;
        $response["msg"] = "Cadastro excluído";
    }
    return print utf8_encode(json_encode($response));
}

?>