<?php
/**
 * =====================================================
 * GUIA DE SQL COM PDO EM PHP
 * =====================================================
 * Este arquivo mostra os principais comandos SQL
 * (CREATE, INSERT, SELECT, UPDATE, DELETE)
 * e como utilizá-los em PHP com PDO.
 * 
 * Cada seção terá:
 * - A sintaxe geral do SQL
 * - Como isso é feito no PHP
 */

// -----------------------------------------------------
// 1. CONEXÃO COM O BANCO DE DADOS
// -----------------------------------------------------
/**
 * Sintaxe:
 * new PDO("driver:host=SERVIDOR;dbname=NOME_DO_BANCO", "USUARIO", "SENHA");
 *
 * driver → qual banco (mysql, pgsql, sqlite, etc.)
 * host → endereço do servidor do banco
 * dbname → nome do banco
 * usuário e senha → credenciais de acesso
 */

    $pdo = new PDO('mysql:host=localhost;dbname=aulasphp1','root','');

// -----------------------------------------------------
// 2. CREATE TABLE (CRIAR TABELA)
// -----------------------------------------------------
/**
 * Sintaxe SQL:
 * CREATE TABLE nome_tabela (
 *   coluna1 TIPO RESTRIÇÕES,
 *   coluna2 TIPO RESTRIÇÕES,
 *   ...
 * );
 *
 * Exemplo abaixo cria uma tabela 'usuarios'
 * com 3 colunas: id, nome e email.
 */
$sqlCreate = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE
    )
";
$pdo->exec($sqlCreate); // exec() é usado para comandos sem retorno (CREATE, DROP, etc).

// -----------------------------------------------------
// 3. INSERT (INSERIR DADOS)
// -----------------------------------------------------
/**
 * Sintaxe SQL:
 * INSERT INTO nome_tabela (coluna1, coluna2, ...)
 * VALUES (valor1, valor2, ...);
 *
 * No PDO, usamos prepare() para montar o comando
 * e execute() para passar os valores com segurança.
 */
    $pdo = new PDO('mysql:host=localhost;dbname=aulasphp1','root','');
    //===============================preparação dos dados============================================
    $sql = $pdo -> prepare("INSERT INTO `usuarios` VALUES (null,?,?)");
    //===============================execuxão e gravações de dados===================================
    $sql -> execute(array($_POST['nome'],
                          $_POST['rua'],

    ));

// -----------------------------------------------------
// 4. SELECT (CONSULTAR DADOS)
// -----------------------------------------------------
/**
 * Sintaxe SQL:
 * SELECT coluna1, coluna2 FROM nome_tabela WHERE condição;
 *
 * SELECT * → seleciona todas as colunas
 * WHERE → filtra registros
 *
 * No PDO, usamos fetch() para pegar 1 registro
 * ou fetchAll() para pegar todos.
 */
    $pdo = new PDO('mysql:host=localhost;dbname=aulasphp1','root','');
    $sql = $pdo->prepare("SELECT * FROM `usuarios` WHERE id=?");
    $sql->execute(array($id));
    $dados = $sql->fetchALL(PDO::FETCH_ASSOC);

// -----------------------------------------------------
// 5. UPDATE (ATUALIZAR DADOS)
// -----------------------------------------------------
/**
 * Sintaxe SQL:
 * UPDATE nome_tabela
 * SET coluna1 = novo_valor, coluna2 = novo_valor
 * WHERE condição;
 *
 * WHERE é obrigatório para evitar atualizar tudo sem querer.
 */
    $pdo = new PDO('mysql:host=localhost;dbname=aulasphp1','root','');
    $sql = $pdo->prepare("UPDATE `usuarios` SET
                                            nome=?,
                                            rua=?,
                                            WHERE id=?");




$sql->execute(array($dados['nome'],
                    $dados['rua'],
                    2
));

// -----------------------------------------------------
// 6. DELETE (REMOVER DADOS)
// -----------------------------------------------------
/**
 * Sintaxe SQL:
 * DELETE FROM nome_tabela WHERE condição;
 *
 * SEM WHERE → apaga TODOS os registros da tabela!
 */
    $pdo = new PDO('mysql:host=localhost;dbname=aulasphp1','root','');
    $sql = $pdo->prepare("DELETE FROM `usuarios` WHERE id=?");
    $sql->execute(array(2));

?>
