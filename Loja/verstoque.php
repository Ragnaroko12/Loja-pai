<?php
    include_once("funçoes.php");
    $dados = consulta();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

     <nav class="navbar navfundo navbar-expand-lg gap-3  ">
            <h3 class="preto">Bem vindo <?php echo $_SESSION['nome']; ?></h3>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link active preto" aria-current="page" href="verstoque.php">Ver Estoque</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  preto " href="#">Ver pedidos Pedidos</a>
                </li>

        </nav>


    <div class="container ">
        <div class="">
            <h1>Doce em estoque</h1>
            <div class="mt-2">
            <table class="table table-striped table-hover  ">
                <thead>
            <tr>
                <th>nome do doce</th>
                <th>qnt</th>
                <th>preço</th>
            </tr>
            </thead>
            <tbody>
            <?php

                foreach ($dados as $key => $value) {

                echo"<tr>";
                echo   "<td>".$dados[$key]["doce"]."</td>";
                echo   "<td>".$dados[$key]["qnt"]."</td>";
                echo   "<td>".$dados[$key]["preço"]." $"."</td>";
                echo   "<td><a href='' class='link-success gap-3'>
                                adicionar doces em estoque 
                            </a>
                        </td>";
                echo   "<td>
                            <a href='funçoes.php?id=".$dados[$key]['id']."&tp=excluir'>
                                deletar doces em estoque 
                            </a>
                        </td>";
                echo    "<td>
                            <a href='' class='link-warning'>
                                atualizar estoque
                            </a>
                        </td>";
                echo"</tr>";
                } 
            ?>
            </tbody>
            </table>
            
            </div>
            

        </div>    
        <div>
            <h1>dddd</h1>
        </div>      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>