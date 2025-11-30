<?php
    session_start();
        if(!isset($_SESSION["nome"])){
        header("location:../index.php");
    }
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
                        <h3>Cadastrar funcionario</h3>
                    </div>
                    <div class="">
                        <form action="funçoes.php?tp=cadastrarfun" class="d-flex flex-column gap-3" method="post">
                            <input type="text" name="nome" class="form-control" placeholder="digite o nome do cliente " id="">
                            <input type="text" name="numero" class="form-control" placeholder="digite o numero do funcionario" id="">
                            <select name="nivel" id="" class="form-select">
                                <option value="#">selecione cargo do funcionario</option>
                                <option value="1">Atendente</option>
                                <option value="2">Cozinheiro</option>
                            </select>
                            <input type="password" name="senha" class="form-control" placeholder="digite a semha do funcionario">
                            <input type="password" name="csenha" class="form-control" placeholder="confirme a senha do funcionario senha">
                            <input type="submit" value="Enviar" class="btn btn-primary">
                            <a href="verpedidos.php" class="btn btn-danger bi-arrow-right">VOLTAR </a>
                            <?php  ?>
                            
                        </form>
                    </div>
                    <div class= "text-center">
                        <small>&copy; azamis doce</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
