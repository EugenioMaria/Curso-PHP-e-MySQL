<?php

    require '../BDconfigPHP.php';
    require '../src/Artigo.php';

    /*$_GET pega o que tem na URL*/
    /*Verifica se o que vem é POST ou GET, e só usa se for POST para nao dar erro*/
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        /*Trás o titulo e conteudo para podermos usar-los*/
        $artigo = new Artigo($mysql);
        $artigo->adicionarArtigo($_POST['titulo'], $_POST['conteudo']);

        //redireciona para a mesma pagina, mas ser os POST, para nao reenviar artigos
        header('Location: /blog/admin/index.php');
        die();
    }
    /*
    'pre' - formata a exibição e &_SERVER é tudo que tem na pagina(var_dump exibe na pagina)
    echo "<pre>"
    var_dump($_SERVER);
    echo "</pre>"
    */
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <!-- 'action' manda as informações do form para a pagina desejada pela URL(se nao tiver o method post),
        nessa caso mandou para mesma pagina. Com o method 'post' então ele manda sem estar na URL-->
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <!-- Name da o nome da variavel, no caso titulo, para ser usado no GET para pegar esse POST -->
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>