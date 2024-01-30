<?php

class Database
{
    /**
     * Objeto de conexão mysqli
     * @var \mysqli
     */
    private $conexao;

    /**
     * Construtor da classe, estabelece a conexão com o banco de dados
     * @return void
     */
    public function __construct()
    {
        $this->conexao = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'));

        // Verifica se há erros na conexão
        if ($this->conexao->connect_error) {
            die("Erro na conexão: " . $this->conexao->connect_error);
        }
    }

    /**
     * Método para inserir dados em uma tabela
     * @param string $tabela - Nome da tabela
     * @param array $dados - Dados a serem inseridos na tabela
     * @return bool - Retorna true se a operação for bem-sucedida, false caso contrário
     */
    public function inserir($dados, $tabela)
    {
        $colunas = implode(", ", array_keys($dados));
        $valores = "'" . implode("', '", $dados) . "'";
        $sql     = "INSERT INTO $tabela ($colunas) VALUES ($valores)";
        return $this->conexao->query($sql);
    }

    /**
     * Método para selecionar dados de uma tabela
     * @param string $tabela - Nome da tabela
     * @param array $condicao - Condição para a seleção (opcional)
     * @return array - Retorna um array associativo com os resultados da seleção
     */
    public function selecionar($condicao, $operadorLike, $tabela)
    {
        $sql = "SELECT * FROM $tabela";

        if (!empty($condicao)) {
            $where = [];
            foreach ($condicao as $coluna => $valor) {

                if ($operadorLike) {
                    $where[] = urldecode("$coluna like '%$valor%'");
                } else {
                    $where[] = urldecode("$coluna = '$valor'");
                }
            }

            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $result = $this->conexao->query($sql);
        $rows   = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * Método para atualizar dados em uma tabela
     * @param string $tabela - Nome da tabela
     * @param array $dados - Dados a serem atualizados na tabela
     * @param array $condicao - Condição para a atualização
     * @return bool - Retorna true se a operação for bem-sucedida, false caso contrário
     */
    public function atualizar($dados, $condicao, $operadorLike, $tabela)
    {
        $set = [];
        foreach ($dados as $coluna => $valor) {
            $set[] = "$coluna = '$valor'";
        }

        if (!empty($condicao)) {
            $where = [];
            foreach ($condicao as $coluna => $valor) {

                if ($operadorLike) {
                    $where[] = urldecode("$coluna like '%$valor%'");
                } else {
                    $where[] = urldecode("$coluna = '$valor'");
                }
            }
        }

        $sql = "UPDATE $tabela SET " . implode(", ", $set) . " WHERE " . implode(" AND ", $where);
        return $this->conexao->query($sql);
    }

    /**
     * Método para excluir dados de uma tabela
     * @param string $tabela - Nome da tabela
     * @param array $condicao - Condição para a exclusão
     * @return bool - Retorna true se a operação for bem-sucedida, false caso contrário
     */
    public function excluir($condicao, $operadorLike, $tabela)
    {
        if (!empty($condicao)) {
            $where = [];
            foreach ($condicao as $coluna => $valor) {

                if ($operadorLike) {
                    $where[] = urldecode("$coluna like '%$valor%'");
                } else {
                    $where[] = urldecode("$coluna = '$valor'");
                }
            }
        }

        $sql = "DELETE FROM $tabela WHERE " . implode(" AND ", $where);
        return $this->conexao->query($sql);
    }

    /**
     * Método para fechar a conexão com o banco de dados
     * @return void
     */
    public function fecharConexao()
    {
        $this->conexao->close();
    }
}
