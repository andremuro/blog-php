<?php

class Redireciona
{

  public function redireciona($url)
  {
    header("Location: $url");
    die();
  }
}
