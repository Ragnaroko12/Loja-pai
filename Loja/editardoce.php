<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Loja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    .azul{
        background-color: rgb(86, 141, 205);
    }
</style>
<body class="d-flex align-items-center justify-content-center vh-100 azul">
 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="">
                    <div class=" text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="">
                        <form action="funçoes.php&gt=concluir" method="post">
                            <div class="d-flex flex-column gap-3 ">
                                <input class="form-control" type="text" name="nome" placeholder="nome do doce" id="">
                                <input class="form-control" type="number" name="qnt" placeholder="quantidade em estoque" id="">
                                <input class="form-control" type="text" name="preco" placeholder="preço do doce" id="">
                                <input type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </form>


                    </div>
                    <div class= "text-center">
                        <small>&copy; azamis doce</small>
                    </div>
                    <?php
                        if (isset($_SESSION['retorno'])) {
                            echo $_SESSION['retorno'];
                            unset($_SESSION['retorno']); // Limpa para não reaparecer após refresh
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



