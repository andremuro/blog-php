<?php

class Artigos
{
  private $mysql;

  public function __construct($mysql)
  {
    $this->mysql = $mysql;
  }
  public function exibirTodos()
  {
    $buscaArtigos = $this->mysql->query('SELECT id, titulo,conteudo FROM artigos');
    $artigos = $buscaArtigos->fetch_all(MYSQLI_ASSOC);

    return $artigos;
  }
}
