<?php
    include_once("funçoes.php");
    $dados = consulta();
    print_r($dados);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Doce em estoque</h1>
        <div class="row">
            <div>
                <a href="">
                    adicionar itens em estoque
                </a>
            </div>
            <div>
                <a href="">
                    deletar itens em estoque 
                </a>
            </div> 


        </div>
        <div class="mt-5">
        <table class="table table-hover">
        <tr>
            <td>id</td>
            <td>Nome</td>
            <td>Cpf</td>
        </tr>
        <?php
        foreach ($dados as $key => $value) {

        echo"<tr>";
        echo   "<td>".$dados[$key]["doce"]."</td>";
        echo   "<td>".$dados[$key]["qnt"]."</td>";
        echo   "<td>".$dados[$key]["preço"]."</td>";
        echo"</tr>";
        } 
        ?>
        <h1>Ingredientes em estoque </h1>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>