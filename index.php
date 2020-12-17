<?php

// Autoload utilizando composer, PSR-4
// Tudo dentro de App será carregado automaticamente

require_once 'vendor/autoload.php';

$produto = new \App\Models\Produto(1 ,"Computador", "i9 16gb"); //namespace

$produtoDao = new \App\Models\ProdutoDao();

$produtoDao->update($produto); 
$produtoDao->read();

foreach($produtoDao->read() as $produto) {
    echo $produto['nome']."<br>".$produto['descricao'];
}
