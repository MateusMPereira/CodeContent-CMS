<?php

require_once "Database.php";

/**
 * Classe ArtigosModel
 * Estende a classe Database para realizar operações CRUD na tabela 'artigos'.
 */
class ArtigosModel extends Database
{
    /**
     * Insere dados na tabela 'artigos'.
     *
     * @param array $dados - Dados a serem inseridos na tabela.
     * @return bool - Retorna true se a operação for bem-sucedida, false caso contrário.
     */
    public function inserir($dados, $nouse = "")
    {
        return parent::inserir($dados, 'artigos');
    }

    /**
     * Seleciona dados da tabela 'artigos'.
     *
     * @param string $condicao - Condição para a seleção (opcional).
     * @return array - Retorna um array associativo com os resultados da seleção.
     */
    public function selecionar($condicao = '', $operadorLike = true, $nouse = "")
    {
        return parent::selecionar($condicao, $operadorLike, 'artigos');
    }

    /**
     * Atualiza dados na tabela 'artigos'.
     *
     * @param array $dados - Dados a serem atualizados na tabela.
     * @param string $condicao - Condição para a atualização.
     * @return bool - Retorna true se a operação for bem-sucedida, false caso contrário.
     */
    public function atualizar($dados, $condicao, $operadorLike = true, $nouse = "")
    {
        return parent::atualizar($dados, $condicao, $operadorLike, 'artigos');
    }

    /**
     * Exclui dados da tabela 'artigos'.
     *
     * @param string $condicao - Condição para a exclusão.
     * @return bool - Retorna true se a operação for bem-sucedida, false caso contrário.
     */
    public function excluir($condicao, $operadorLike = true, $nouse = "")
    {
        return parent::excluir($condicao, $operadorLike, 'artigos');
    }
}
