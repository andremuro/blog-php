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

  public function exibirArtigoPeloId($id)
  {
    $buscaArtigo = $this->mysql->prepare('SELECT id, titulo,conteudo FROM artigos WHERE id = ?');
    $buscaArtigo->bind_param('s', $id);
    $buscaArtigo->execute();
    $artigo = $buscaArtigo->get_result()->fetch_assoc();

    return $artigo;
  }

  public function adicionarArtigo($titulo, $conteudo)
  {
    $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?)');
    $insereArtigo->bind_param('ss', $titulo, $conteudo);
    $insereArtigo->execute();
  }
}
