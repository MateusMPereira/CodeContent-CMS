<?php

require_once SRC_PATH . "/model/ArtigosModel.php";

class ArtigosController
{
    /**
     * Matriz de retorno de dados para a view
     * @var \array
     */
    public $viewData;

    /** Seleciona diversos artigos
     * @return void
     */
    public function index()
    {
        $artigos = new ArtigosModel;
        if (!empty(QUERY_STRING)) {
            $dadosArtigos = $artigos->selecionar(QUERY_STRING);
        } else {
            $dadosArtigos = $artigos->selecionar(['data_criacao' => '2023-12-17'], false);
        }

        if ($dadosArtigos) {
            foreach ($dadosArtigos as $artigo) {
                $this->viewData['titulo_pagina']     = 'Português para Vestibular';
                $this->viewData['titulo_artigo']     = $artigo['titulo'];
                $this->viewData['descricao_artigo']  = $artigo['conteudo'];
                $this->viewData['autor_artigo']      = $artigo['autor'];
                $this->viewData['publicacao_artigo'] = date("d-m-Y", strtotime($artigo['data_criacao']));
                $this->viewData['alteracao_artigo']  = date("d-m-Y", strtotime($artigo['data_ultima_modificacao']));
            }
        } else {
            exit(file_get_contents(PUBLIC_PATH . '/errors/404.html'));
        }
    }

    /** Cria um novo artigo
     * @return void
     */
    public function store()
    {
        $artigos = new ArtigosModel;
    }

    /** Seleciona um artigo pelo ID
     * @return void
     */
    public function show()
    {
        $artigos = new ArtigosModel;
    }

    /** Atualiza um artigo pelo ID
     * @return void
     */
    public function update()
    {
        $artigos = new ArtigosModel;
    }

    /** Deleta um artigo pelo ID
     * @return void
     */
    public function destroy()
    {
        $artigos = new ArtigosModel;
    }
}
