<?php


function init(){
    $pdo = new PDO('mysql:host=localhost;dbname=azami','root','');    
    return $pdo;
}

function consulta(){ 
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `doces`");
    $sql->execute(array());
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}
?>