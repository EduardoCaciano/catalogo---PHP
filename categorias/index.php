<?php
require("../database/conexao.php");

$sql = " SELECT * FROM tbl_categoria ";

$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles-global.css" />
    <link rel="stylesheet" href="./categorias.css" />
    <title>Administrar Categorias</title>
</head>

<body>
    <?php
    include("../componentes/header/header.php");
    ?>
    <div class="content">
        <section class="categorias-container">
            <main>
                <form class="form-categorias" method="POST" action="actions.php">
                    <h1 class="span2">Adicionar Categorias</h1>
                    <div class="input-group span2">
                        <input type="hidden" name="acao" value="salvar"/>
                        <label for="descricao">Descricao</label>
                        <input type="text" name="descricao" id="descricao" placeholder="Digite a categoria" />
                    </div>
                    <button type="button">Cancelar</button>
                    <button>Salvar</button>
                </form>
                <h1>Lista de categorias</h1>
                <div class="card-categorias">
                    <?php
                        while ($descricao = mysqli_fetch_array($resultado)){
                    ?>
                        <div class="card-categorias">
                            <?= $tarefa["descricao"] ?>
                            <form method="POST" action="actions.php">
                                <input type="hidden" name="acao" value="deletar" />
                                <input type="hidden" name="tarefaId" value="<?= $tarefa["id"] ?>" />
                            </form>
                        </div>
                    <?php
                        }
                    ?>
                    Roupas
                    <img src="https://icons.veryicon.com/png/o/construction-tools/coca-design/delete-189.png" />
                </div>
            </main>
        </section>
    </div>
</body>

</html>