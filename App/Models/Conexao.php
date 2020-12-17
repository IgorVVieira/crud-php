<?php 

namespace App\Models;

// Padrão Simgleton, tendo apenas uma instância da classe

class Conexao {
    
    private static $instance;

    public static function getInstance() {
        //Se n existir a instância, será criado uma nova
        // Self acessa atributos e métodos estáticos de uma classe
        if(!isset(self::$instance)) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=crud;charset=utf8','root','');
        }

        return self::$instance;
    }
}
