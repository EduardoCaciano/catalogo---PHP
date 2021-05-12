<?php

require("../../database/conexao.php");

switch ($_POST["acao"]) {
    case "login":
        //implementar hoje

        //receber os campos usuário e senha do post
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        //montaro sql select na tabela tbl_administrador
        $sql = " SELECT * FROM tbl_administrador ";

        //SELECT * FROM tbl_administrador WHERE usuario = $usuario;
        $sqlSelect = "SELECT * FROM tbl_administrador WHERE usuario = $usuario";

        //executar o sql
        $resultado = mysqli_query($conexao, $sqlSelect) or die(mysqli_error($conexao));

        //verificar se o usuário existe
        foreach($resultado as $usuario){
            if($sqlSelect == "Helena"){
                echo "encontrado";
            } else{
                echo "não encontrado";
            }
        }

        //verificar se a senha está correta

        //se estiver correta, salvar o id e o nome do usuário na sessão $_SESSION

        //se a senha estiver errada, criar uma mensagem de "usuário e/ou senha inválidos"
        
        //redirecionar para a tela de listagem de produtos
        header("location: index.php");
        break;

    case "logou":
        //implementar futuramente
        break;
}