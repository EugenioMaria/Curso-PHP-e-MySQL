<?php
    /*O array $_GET armazena as informações enviadas por parâmetro na URL.

    $_POST -> Podemos acessar os dados do formulário a partir do array superglobal post, usando o atributo
    name do HTML como chave do array.

    O array $_SERVER armazena as informações do ambiente de execução.*/

    require 'BDconfigPHP.php';
    require 'src/artigo.php';
    
    $objArt = new Artigo($mysql);
    /*Manda o id da URL para o metodo encontrarPorId e salva o retorno (o artigo) em uma variavel*/
    $artigo = $objArt->encontrarPorId($_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1><?php echo $artigo['titulo']; ?></h1>
        <p>
            <!--'NL2BR' new line to br, br é espaço, quando da o enter normal ele n pula linha, essa função converte
                o enter normal para <br>, que é como o HTML entende \n -->
            <?php echo nl2br($artigo['conteudo']); ?>
        </p>
        <div>
            <a class="botao botao-block"
            href="index.php">Voltar</a>
        </div>
    </div> 
</body>

</html>