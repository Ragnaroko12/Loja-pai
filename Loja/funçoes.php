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

// função abaixo cadastra doçes funcionarios e ingredientes do estoque 
if(isset($_GET['tp'])){
    if($_GET['tp'] == "adicionar"){
        cadastrar($_GET['gt']);
    }
}
function cadastrar($tipo){
// o $tipo especifica em qual banco de dados o cadastro ocorrera 
    if($tipo == 1){
    
        $pdo = new PDO('mysql:host=localhost;dbname=azami','root','');
    
        $sql = $pdo -> prepare("INSERT INTO `doces` VALUES (null,?,?,?)");
   
        $sql -> execute(array($_POST['nome'],
                          $_POST['qnt'],
                          $_POST['preço'],
        ));
        echo 1;
        header("location:verstoque.php");
    }elseif ($tipo == 2){
        $pdo = new PDO('mysql:host=localhost;dbname=azami','root','');
    
        $sql = $pdo -> prepare("INSERT INTO `ingredientes` VALUES (null,?,?,?)");
   
        $sql -> execute(array($_POST['nome'],
                          $_POST['custo'],
                          $_POST['qnt'],
        ));

        header("location:verstoque.php");
    }elseif ($tipo == 3){
        $pdo = new PDO('mysql:host=localhost;dbname=azami','root','');
    
        $sql = $pdo -> prepare("INSERT INTO `Pedidos` VALUES (null,?,?,?,?)");
   
        $sql -> execute(array($_POST['nome'],
                            $_POST['doce'],
                            $_POST['qnt'],                        
                            $_POST['Status'],

        ));

        header("location:verpedidos.php");
    };

}

//--------------------------tudo relacionado ao estoque doces no geral abaixo ---------------------//
if(!empty($_GET['id'])){
    if (isset($_GET['id']) and $_GET['tp'] == "excluir" and $_GET['gt'] == "doces"){
        exclusãod($_GET['id']);
    }elseif (isset($_GET['id']) and $_GET['tp'] == "alterar" and $_GET['gt'] == "doces"){
        $_SESSION['id'] = $_GET['id'];
        alterard($_GET['id']);
    }
}
if (isset($_SESSION['id']) and isset($_GET['tp']) ){
    if ($_GET['tp'] == "concluir" and $_GET['gt'] == "doces" ){
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


$sql->execute(array($dados['nome'],
                    $dados['qnt'],
                    $dados['preco'],
                    $id
));

$_SESSION['id'] = null;

    header('location: verstoque.php');

}

function alterard($id){
    $_SESSION['id'] = $id;
    header('location: editardoce.php');
}

function consultaid($id){
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `doces` WHERE id=?");
    $sql->execute(array($id));
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}

function exclusãod($id){
    $pdo = init();
    $sql = $pdo->prepare("DELETE FROM `doces` WHERE id=?");
    $sql->execute(array($id));
    header("location:verstoque.php");
}



//--------------------------------tudo relacionado ao estoque de ingredientes abaixo -------------------------//

if(!empty($_GET['id'])){
    if (isset($_GET['id']) and $_GET['tp'] == "excluir" and $_GET['gt'] == "ingredientes"){
        exclusãoi($_GET['id']);
    }elseif (isset($_GET['id']) and $_GET['tp'] == "alterar" and $_GET['gt'] == "ingredientes"){
        $_SESSION['id'] = $_GET['id'];
        alterari();
    }
}
if (isset($_SESSION['id']) and isset($_GET['tp']) ){
    if ($_GET['tp'] == "concluir" and $_GET['gt'] == "ingredientes"){
        concluiri($_SESSION['id'],$_POST);
    }
}

function concluiri($id,$dados){
    //i = ingredientes
    $pdo = init();
     $sql = $pdo->prepare("UPDATE `ingredientes` SET
                                            nome=?,
                                            qnt=?,
                                            Custo=?
                                            WHERE id=?");


$sql->execute(array($dados['nome'],
                    $dados['qnt'],
                    $dados['Custo'],
                    $id
));

$_SESSION['id'] = null;
    header('location: verstoque.php');

}

function alterari(){
    
    header('location: editaringredientes.php');
}


function consultaii($id){
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `ingredientes` WHERE id=?");
    $sql->execute(array($id));
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}

function consultai(){
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `ingredientes`");
    $sql->execute(array());
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}

function exclusãoi($id){
    $pdo = init();
    $sql = $pdo->prepare("DELETE FROM `ingredientes` WHERE id=?");
    $sql->execute(array($id));
    header("location:verstoque.php");
}
//-----------------------tudo relacionado aos pedidos--------------//

if(!empty($_GET['id'])){
    if (isset($_GET['id']) and $_GET['tp'] == "excluir" and $_GET['gt'] == "pedido"){
        exclusãop($_GET['id']);
    }elseif (isset($_GET['id']) and $_GET['tp'] == "alterar" and $_GET['gt'] == "pedido"){
        $_SESSION['id'] = $_GET['id'];
        alterarp();
    }
}
if (isset($_SESSION['id']) and isset($_GET['tp']) ){
    if ($_GET['tp'] == "concluir" and $_GET['gt'] == "pedido"){
        concluirp($_SESSION['id'],$_POST);
    }
}

function concluirp($id,$dados){
    //i = ingredientes
    $pdo = init();
     $sql = $pdo->prepare("UPDATE `Pedidos` SET
                                            nome=?,
                                            doce=?,
                                            qnt=?,
                                            Stat=?
                                            WHERE id=?");


$sql->execute(array($dados['nome'],
                    $dados['doce'],  
                    $dados['qnt'],
                    $dados['Status'],
                    $id
));

$_SESSION['id'] = null;
    header('location: verpedidos.php');

}

function alterarp(){
    
    header('location: editarpedidos.php');
}


function consultaip($id){
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `Pedidos` WHERE id=?");
    $sql->execute(array($id));
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}

function consultap(){
    $pdo = init();
    $sql = $pdo->prepare("SELECT * FROM `Pedidos`");
    $sql->execute(array());
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $dados;
}

function exclusãop($id){
    $pdo = init();
    $sql = $pdo->prepare("DELETE FROM `Pedidos` WHERE id=?");
    $sql->execute(array($id));
    header("location:verpedidos.php");
}
?>