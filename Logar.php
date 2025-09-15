<?php
$pdo = new PDO('mysql:host=localhost;dbname=azami','root','');

$sql = $pdo -> prepare("SELECT * FROM `usuarios` WHERE email=? AND senha=?");

$sql->execute(array($_POST['email'], sha1($_POST['senha'])));

$dados = $sql ->fetchALL(PDO::FETCH_ASSOC);
print_r($dados);
session_start();
if (!empty($dados)) {
    $usuario = $dados[0];
    $_SESSION['usuario'] = $usuario['email'];
    $_SESSION['nome'] = $usuario['nome'];
    header("Location: adm.php");
} else {
    $_SESSION['retorno'] = "<div class='alert alert-danger' role='alert'>
    Saia Ladrão! Usuário ou senha incorretos.
    </div>";
    header("Location: tela-de-login.php");

}
?>