<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=azami','root','');

$sql = $pdo -> prepare("SELECT * FROM `usuarios` WHERE nome=? AND senha=?");

$sql->execute(array($_POST['nome'], sha1($_POST['senha'])));

$dados = $sql ->fetchALL(PDO::FETCH_ASSOC);

if (!empty($dados)) {
    $usuario = $dados[0];
    $_SESSION['nivel'] = $usuario['nivel de acesso'];
    $_SESSION['nome'] = $usuario['nome'];
    header("location: adm.php");
} else {
    $_SESSION['retorno'] = "<div class='alert alert-danger' role='alert'>
    Saia Ladrão! Usuário ou senha incorretos.
    </div>";
    header("location: login.php");


}