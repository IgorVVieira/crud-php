<?php

namespace App\Models;

class ProdutoDao
{

    public function create(Produto $produto)
    {
        //? = bindValues
        $sql = 'INSERT INTO produtos (nome, descricao, valor) VALUES (? , ?, ?)';

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getDescricao());
        $stmt->bindValue(3, $produto->getValor());

        $stmt->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM produtos';

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        //Verifica se retornou pelo menos um registro
        if ($stmt->rowCount() > 0) {
            //Método que retorna array com todos registros
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function update(Produto $produto)
    {
        $sql = 'UPDATE produtos SET nome = ?, descricao = ?, valor = ? WHERE id = ?';

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getDescricao());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getId());

        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM produtos WHERE id = ?';

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
