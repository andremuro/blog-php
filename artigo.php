<?php

require_once 'src/Artigos.php';
require_once 'Conexao.php';

$buscaArtigo = new Artigos($mysql);
$artigo = $buscaArtigo->exibirArtigoPeloId($_GET['id']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Meu Blog</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div id="container">
    <h1><?php echo $artigo['titulo'] ?></h1>
    <p>
      <?php echo $artigo['conteudo'] ?>
    </p>
    <div>
      <a class="botao botao-block" href="index.php">Voltar</a>
    </div>
  </div>
</body>

</html>