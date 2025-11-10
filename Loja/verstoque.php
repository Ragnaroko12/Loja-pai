<?php
    include_once("funçoes.php");
    $dados = consulta();
    $dados2 = consultai();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navfundo navbar-expand-lg d-flex align-items-center px-3">
  <h3 class="preto mb-0 me-3">
    Bem vindo <?php echo $_SESSION['nome']; ?>
  </h3>

  <ul class="navbar-nav d-flex flex-row gap-3">
    <li class="nav-item">
      <a class="nav-link active preto" aria-current="page" href="verstoque.php">Ver Estoque</a>
    </li>

    <li class="nav-item">
      <a class="nav-link active preto" href="verpedidos.php">Ver Pedidos</a>
    </li>
    <?php if ($_SESSION['nivel'] == 3){?>
        <li class="nav-item">
            <a class="nav-link active preto" href="#">Cadastrar funcionarios</a>
        </li>
    <?php } ?>
  </ul>

  <a href="adm.php" class="btn btn-danger ms-auto">Voltar</a>
</nav>

<div class="container">
    <?php 
    echo $_SESSION['nivel'];
    if ($_SESSION['nivel'] == 1 or $_SESSION['nivel'] == 3) {
    ?>
        <div class="d-flex flex-row align-items-center">
            <h1 class="mb-0">Doce em estoque</h1>
            <a href="adicionardoce.php" class="btn btn-success ms-auto mt-3">Adicionar doce</a>
        </div>

        <div class="mt-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>nome do doce</th>
                        <th>qnt</th>
                        <th>preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dados as $key => $value) {
                        echo "<tr>";
                        echo   "<td>".$dados[$key]["nome"]."</td>";
                        echo   "<td>".$dados[$key]["qnt"]."</td>";
                        echo   "<td>".$dados[$key]["preço"]." $"."</td>";
                        echo   "<td>
                                    <a class='link-danger' href='funçoes.php?id=".$dados[$key]['id']."&tp=excluir&gt=doces'>
                                        deletar doces em estoque 
                                    </a>
                                </td>";
                        echo   "<td>
                                    <a class='link-warning' href='funçoes.php?id=".$dados[$key]['id']."&tp=alterar&gt=doces'>
                                        alterar doces em estoque
                                    </a>
                                </td>";
                        echo "</tr>";
                    } 
                    ?>
                </tbody>
            </table>
        </div>
        <br><br><br>
    <?php
    } 
    if ($_SESSION['nivel'] == 2 or $_SESSION['nivel'] == 3){
    ?>
       <div class="d-flex flex-row align-items-center">
            <h1 class="mb-0">ingredientes em estoque</h1>
            <a href="adicionaringrediente.php" class="btn btn-success ms-auto mt-3">Adicionar ingredientes</a>
        </div>

        <div class="mt-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>nome do doce</th>
                        <th>qnt</th>
                        <th>Custo do produto</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dados2 as $key => $value) {
                        echo "<tr>";
                        echo   "<td>".$dados2[$key]["nome"]."</td>";
                        echo   "<td>".$dados2[$key]["qnt"]."</td>";
                        echo   "<td>".$dados2[$key]["Custo"]." $"."</td>";
                        echo   "<td>
                                    <a class='link-danger' href='funçoes.php?id=".$dados2[$key]['id']."&tp=excluir&gt=ingredientes'>
                                        deletar doces em estoque 
                                    </a>
                                </td>";
                        echo   "<td>
                                    <a class='link-warning' href='funçoes.php?id=".$dados2[$key]['id']."&tp=alterar&gt=ingredientes'>
                                        alterar doces em estoque
                                    </a>
                                </td>";
                        echo "</tr>";
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
