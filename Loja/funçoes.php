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
        $_SESSION['id'] = $_GET['id'];
        alterar($_GET['id']);
    }
}
if (isset($_SESSION['id']) and isset($_GET['id'])){
    if ($_GET['tp'] == "concluir" ){
        concluird($_SESSION['id'],$_POST);
        print_r($_POST);
    }
}

function concluird($id,$dados){
    //d = doces
    $pdo = init();
     $sql = $pdo->prepare("UPDATE `doces` SET
                                            nome=?,
                                            qnt=?,
                                            preço=?
                                            WHERE id=?");

echo "vazio1";
$sql->execute(array($dados['nome'],
                    $dados['qnt'],
                    $dados['preco'],
                    $id
));

$_SESSION['id'] = null;

    header('location: verstoque.php');

}

function alterar($id){
    $_SESSION['id'] = $id;
    header('location: editardoce.php');
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

function consultaid($id){
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `doces` WHERE id=?");
    $sql->execute(array($id));
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}

function exclusão($id,){
    $pdo = init();
    $sql = $pdo->prepare("DELETE FROM `doces` WHERE id=?");
    $sql->execute(array($id));
    header("location:verstoque.php");
}
?>