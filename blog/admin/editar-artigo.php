<?php
    require '../BDconfigPHP.php';
    include '../src/Artigo.php';
    require '../src/redireciona.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $artigo = new Artigo($mysql);
        $art = $artigo->encontrarPorId($_GET['id']);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        /*Trás o titulo e conteudo para podermos usar-los*/
        $artigo = new Artigo($mysql);
        $art = $artigo->editarArtigo($_POST['id'], $_POST['titulo'], $_POST['conteudo']);

        //redireciona para a mesma pagina, mas ser os POST, para nao reenviar artigos
        header('Location: /blog/admin/index.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <!-- 'FORM' manda um POST a outra pagina ou a mesma, dando a chance de enviar ao banco de dados -->
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <!--Manda titulo para prx pagina-->
                <input class="campo-form" type="text"
                    name="titulo" id="titulo" value="<?php echo $art['titulo']; ?>"/>
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <!--Manda conteudo para prx pagina-->
                <textarea cols = "70" rows = "10" 
                    class="campo-form" type="text" 
                    name="conteudo"><?php echo $art['conteudo']; ?></textarea>
            </p>
            <p>
                <!--Manda Id para prx pag-->
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>