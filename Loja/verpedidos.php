<?php
    include_once("funçoes.php");
    $dados = consultap();

    if(!isset($_SESSION["nome"])){
        header("location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    .papel{
        width: 300px;
        height: 350px;
    }
</style>
<body>

    <nav class="navbar navfundo navbar-expand-lg d-flex align-items-center px-3 mb-4">
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
            <a class="nav-link active preto" href="CadastrarFuncionario.php">Cadastrar funcionarios</a>
        </li>
    <?php } ?>
  </ul>

  <a href="logout.php" class="btn btn-danger ms-auto">Sair</a>
</nav>

    <div class="container d-flex flex-row">
        <h1>Pedidos</h1>
        <a href="adicionarpedido.php" class="link-success mt-3 ms-auto">adicionar pedido</a>
    </div>
    <div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>nome do cliente</th>
                    <th>doce</th>
                    <th>qnt</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dados as $key => $value) {
                    echo "<tr>";
                    echo   "<td>".$dados[$key]["nome"]."</td>";
                    echo   "<td>".$dados[$key]["doce"]."</td>";
                    echo   "<td>".$dados[$key]["qnt"]."</td>";                    
                    echo   "<td>".$dados[$key]["Stat"]."</td>";
                    if ($_SESSION['nivel'] == 1 or $_SESSION['nivel'] == 3){
                    echo   "<td>
                                <a class='link-danger' href='funçoes.php?id=".$dados[$key]['id']."&tp=excluir&gt=pedido'>
                                    deletar pedido
                                </a>
                            </td>";
                    }
                    if ($_SESSION['nivel'] == 2 or $_SESSION['nivel'] == 3){
                        echo   "<td>
                                    <a class='link-warning' href='funçoes.php?id=".$dados[$key]['id']."&tp=alterar&gt=pedido'>
                                        alterar pedido
                                    </a>
                                </td>";
                    }
                    echo "</tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
