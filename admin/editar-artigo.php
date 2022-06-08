<?php

require_once '../src/Artigos.php';
require_once '../src/Redireciona.php';
require_once '../Conexao.php';

$artigo = new Artigos($mysql);

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $artigos = $artigo->exibirArtigoPeloId($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    var_dump($_POST['id']);
    var_dump($_POST['titulo']);
    var_dump($_POST['conteudo']);
    $editarArtigo = $artigo->atualizarArquivos($_POST['id'], $_POST['titulo'], $_POST['conteudo']);

    $redireciona = new Redireciona();
    $redireciona->redireciona('index.php');
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
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $artigos['titulo']; ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo">
                <?php echo nl2br($artigos['conteudo']); ?>
                </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>