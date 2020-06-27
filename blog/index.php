<!--Código PHP-->
<?php

/*Require faz rodar ou dar erro*/
require 'BDconfigPHP.php';

/*Trás o arquivo artigo.php*/
include 'src/artigo.php';
$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();
?>

<!--Código HTML-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <!--For para repetir o código e colar varios artigos de uma vez-->
        <?php foreach($artigos as $art): ?>
        <h2>
            <!-- Manda o ID do artigo junto ao link, para podermos fazer um Select na outra pagina -->
            <a href="artigo.php?id=<?php echo $art['id']; ?>">
                <!--Trás do PHP o titulo do artigo1-->
                <?php echo $art['titulo']; ?>
            </a>
        </h2>
        <p>
            <!--'NL2BR' new line to br, br é espaço, quando da o enter normal ele n pula linha, essa função converte
                o enter normal para <br>, que é como o HTML entende \n -->
            <?php echo nl2br($art['conteudo']); ?>
        </p>
        <?php endforeach; ?>
    </div> 
</body>

</html>