<?php

//importa a conexão com o banco de dados
require("../../database/conexao.php");

//vc não está enviando a ação no formulário... 

//agora sim, ou então você poderia comentar o switch, já que por enquanto esse arquivo só tem a ação de inserir

//faltou tbm os names nos campos

//todo campo precisa do name, é atravéz dele que você consegue recuperar aqui

//corrija isso que vai funcionar

// switch ($_POST["acao"]) {
    
    // case "salvar":
        //se houver o envio do fomulário com uma tarefa
        if (isset($_POST["descricao"]) && isset($_POST["peso"]) && isset($_POST["quantidade"])&& isset($_POST["cor"]) && isset($_POST["tamanho"]) && isset($_POST["valor"]) && isset($_POST["desconto"])) {
            $descricao = $_POST["descricao"];
            $peso = $_POST["peso"];
            $quantidade = $_POST["quantidade"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $valor = $_POST["valor"];
            $desconto = $_POST["desconto"];

            //declara o SQL de inserção
            $sqlInsert = "INSERT INTO tbl_produto (descricao, peso, quantidade, cor, tamanho, valor, desconto) VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', '$valor', '$desconto')";

            //executa o SQL
            $resultado = mysqli_query($conexao, $sqlInsert) or die(mysqli_error($conexao));

            if($resultado){
                $mensagem = "Tarefa adicionada com sucesso!";
                $tipoMensagem = "sucesso"; 
            }else{
                $mensagem = "Erro ao adicionar tarefa!";
                $tipoMensagem = "erro"; 
            }
        }
        // break;      
    // }

    //redirecionar para tela de listagem (index.php) com a mensagem
    header("location: http://localhost/web-backend/web-backend-a/icatalogo-parte1/produtos/");

?>