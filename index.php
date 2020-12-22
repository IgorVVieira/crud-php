<?php

// Autoload utilizando composer, PSR-4
// Tudo dentro de App será carregado automaticamente

require_once 'vendor/autoload.php';

$produto = new \App\Models\Produto(1 ,"Computador", "i9 16gb", 5000.00);
$produto2 = new \App\Models\Produto(2 ,"Cadeira presidente", "Confortável e ergonômica", 960.50); //namespace

$produtoDao = new \App\Models\ProdutoDao();
$produtoDao->create($produto);
$produtoDao->create($produto2);

foreach($produtoDao->read() as $produto) {
    echo "{$produto['nome']}, {$produto['descricao']}, Valor: R$ {$produto['valor']}\n\n";
}
