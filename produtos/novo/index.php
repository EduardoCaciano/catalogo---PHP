<?php

require("../../database/conexao.php");

$sql = " SELECT * FROM tbl_produto ";

$resultado = mysqli_query($conexao, $sql);

session_start();
// verifica se o usuário não esta logado
if(!isset($_SESSION["usuarioId"])){
    // declara e coloca um erro nas mensagem da sessão
    $erros = ["Acesso negado, você precisa logar."];
    $_SESSION["mensagem"] = $erros;
// redirecionamos para listagem de produtos
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./novo.css" />
  <title>Administrar Produtos</title>
</head>

<body>
  <header>
    <input type="search" placeholder="Pesquisar" />
  </header>
  <div class="content">
    <section class="produtos-container">
      <main>
        <form class="form-produto" method="POST" action="actions.php">
          <input type="hidden" name="acao" value="inserir" />
          <h1>Cadastro de produto</h1>
          <ul>
            <?php
            // se tiver erros na sessao, listar os erros na tela
              if(isset($_SESSION["erros"])){
                foreach($_SESSION["erros"] as $erro){
            ?>
                  <li><?= $erro ?></li>
            <?php
                }
                unset($_SESSION["erros"]);
              }
            ?>
          </ul>
          <div class="input-group span2">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto" required>
          </div>
          <div class="input-group">
            <label for="peso">Peso</label>
            <input type="text" name="peso" id="peso" placeholder="Digite o peso" required>
          </div>
          <div class="input-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade" id="quantidade" placeholder="Digite a quantidade" required>
          </div>
          <div class="input-group">
            <label for="cor">Cor</label>
            <input type="text" name="cor" id="cor" placeholder="Digite a cor" required>
          </div>
          <div class="input-group">
            <label for="tamanho">Tamanho</label>
            <input type="text" name="tamanho" id="tamanho" placeholder="Digite o tamanho">
          </div>
          <div class="input-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" placeholder="Digite o valor" required>
          </div>
          <div class="input-group">
            <label for="desconto">Desconto</label>
            <input type="text" name="desconto" id="desconto" placeholder="Digite o desconto">
          </div>
          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>
        </form>
      </main>
    </section>
  </div>
  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>
</body>

</html>