<?php
session_start();
    if(!isset($_SESSION["name"])){
        header("location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    .navfundo{
        background-color: rgb(35, 43, 82);
    }   
    .preto{
        color: rgb(0, 0, 0);
    }
</style>

<body>

        <nav class="navbar navfundo navbar-expand-lg gap-3 p-3
          ">
            <h3 class="preto">Bem vindo <?php echo $_SESSION['nome']; ?></h3>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link active preto" aria-current="page" href="verstoque.php">Ver Estoque</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  preto " href="#">Ver pedidos Pedidos</a>
                </li>

        </nav>
    <div class="container">


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>