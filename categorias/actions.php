<?php
    require("../database/conexao.php");

    switch ($_POST["acao"]) {

        case "salvar":
           //se houver o envio do fomulário com uma descricao
        if (isset($_POST["descricao"])) {
            $descricao = $_POST["descricao"];

            //declara o SQL de inserção
            $sqlInsert = " INSERT INTO tbl_categoria (descricao) VALUES ('$descricao') ";

            //executa o SQL
            $resultado = mysqli_query($conexao, $sqlInsert);

            if($resultado){
                $mensagem = "Categoria adicionada com sucesso!";
                $tipoMensagem = "sucesso"; 
            }else{
                $mensagem = "Erro ao adicionar nova categoria!";
                $tipoMensagem = "erro"; 
            }
        }
        break;

        case "deletar":
            //verificar se veio o categoriaId
            if (isset($_POST["categoriaId"])) {
                $tarefaId = $_POST["categoriaId"];
    
                //declarar o sql de delete
                $sqlDelete = " DELETE FROM task_list WHERE id = $tarefaId ";
    
                //executar o sql
                $resultado = mysqli_query($conexao, $sqlDelete);
    
                if($resultado){
                    $mensagem = "Tarefa excluída com sucesso!";
                    $tipoMensagem = "sucesso"; 
                }else{
                    $mensagem = "Erro ao excluir a tarefa!";
                    $tipoMensagem = "erro"; 
                }
            }
            break;
    }

    //redirecionar para tela de listagem (index.php) com a mensagem
    header("location: index.php?");