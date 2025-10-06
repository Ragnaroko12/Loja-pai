<style>
    .navfundo{
        background-color: rgb(35, 43, 82);
    }   
    .preto{
        color: rgb(0, 0, 0);
    }
</style>
<?php
session_start();

if(!empty($_GET['id'])){
    if (isset($_GET['id']) and $_GET['tp'] == "excluir"){
        exclusão($_GET['id']);
    }elseif (isset($_GET['id']) and $_GET['tp'] == "alterar"){
            alterar($_GET['id']);
    }
}

function alterar($id){
    $_SESSION['id'] = $id;
    header('location:editardoce.php');
}
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

function exclusão($id){
    $pdo = init();
    $sql = $pdo->prepare("DELETE FROM `doces` WHERE id=?");
    $sql->execute(array($id));
    header("location:verstoque.php");
}
?>