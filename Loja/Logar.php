<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=azami','root','');

$sql = $pdo -> prepare("SELECT * FROM `usuarios` WHERE nome=? AND senha=?");

$sql->execute(array($_POST['nome'], sha1($_POST['senha'])));

$dados = $sql ->fetchAll(PDO::FETCH_ASSOC);

if (!empty($dados)) {
    $usuario = $dados[0];
    $_SESSION['nivel'] = $usuario['nivel_de_acesso'];
    $_SESSION['nome'] = $usuario['nome'];
    print_r($usuario);
    header("location: verpedidos.php");
} else {
    $_SESSION['retorno'] = "<div class='alert alert-danger' role='alert'>
    Saia Ladrão! Usuário ou senha incorretos.
    </div>";
    
    header("location: ../index.php");


}