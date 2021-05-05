<?php

session_start();

//validação
function validarCampos(){
    $erros = [];

    //validar se campo descricao está preenchido
    if (!isset($_POST["descricao"]) && $_POST["descricao"] == "") {
        $erros[] = "O campo descrição é obrigatório";
    }

    //validar se o campo peso está preenchido
    if (!isset($_POST["peso"]) && $_POST["peso"] == "") {
        $erros[] = "O campo peso é obrigatório";
      //validar se o campo peso é um número
    } elseif (!is_numeric(str_replace(",", ".", $_POST["peso"]))) {
        $erros[] = "O campo peso deve ser um número";
    }

     //validar se o campo peso está preenchido
     if (!isset($_POST["quantidade"]) && $_POST["quantidade"] == "") {
        $erros[] = "O campo quantidade é obrigatório";
      //validar se o campo peso é um número
    } elseif (!is_numeric(str_replace(",", ".", $_POST["quantidade"]))) {
        $erros[] = "O campo quantidade deve ser um número";
    }

     //validar se o campo peso está preenchido
     if (!isset($_POST["cor"]) && $_POST["cor"] == "") {
        $erros[] = "O campo cor é obrigatório";
    }

     //validar se o campo peso está preenchido
     if (!isset($_POST["valor"]) && $_POST["valor"] == "") {
        $erros[] = "O campo valor é obrigatório";
      //validar se o campo peso é um número
    } elseif (!is_numeric(str_replace(",", ".", $_POST["valor"]))) {
        $erros[] = "O campo valor deve ser um número";
    }

    // se o campo desconto veio preenchido, testa se ele é numérico
    if (isset($_POST["desconto"]) && $_POST["desconto"] != "" && !is_numeric((str_replace(",", ".", $_POST["desconto"])))){
        $erros[] = "O campo desconto deve ser um número";
    }

    // retorna os erros
    return $erros;
}

//importa a conexão com o banco de dados
require("../../database/conexao.php");

switch ($_POST["acao"]) {

    case "inserir":
        // chamamos a função de validação para verificar se tem erros
        $erros = validarCampos();

        // se houver erros
        if (count($erros) > 0) {
            
            // incluimos um campo erros na sessão e atribuimos o vetor de erros a ele
            $_SESSION["erros"] = $erros;

            header("location: novo/index.php?erros=$erros");
        }

}

            $descricao = $_POST["descricao"];
            $peso = str_replace(",", ".", $_POST["peso"]);
            $quantidade = $_POST["quantidade"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $valor = str_replace(",", ".", $_POST["valor"]);
            $desconto = $_POST["desconto"] != "" ? $_POST["desconto"] : 0;

            //declara o SQL de inserção
            $sqlInsert = "INSERT INTO tbl_produto (descricao, peso, quantidade, cor, tamanho, valor, desconto) 
                          VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', '$valor', '$desconto')";

            //executa o SQL
            $resultado = mysqli_query($conexao, $sqlInsert) or die(mysqli_error($conexao));

            // verificamos se deu certo ou não
            if ($resultado) {
                $mensagem = "Produto inserido com sucesso";
            } else {
                $mensagem = "Erro ao inserir o produto!";
            }
        

    //redirecionar para tela de listagem (index.php) com a mensagem
    header("location: index.php");

?>