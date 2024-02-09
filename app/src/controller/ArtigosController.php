<?php

require_once SRC_PATH . "/controller/Controller.php";
require_once SRC_PATH . "/model/ArtigosModel.php";
require_once SRC_PATH . '/classes/Julia.php';

class ArtigosController extends Controller
{
    /** Seleciona diversos artigos
     * @return void
     */
    public function index($request)
    {
        $artigos = new ArtigosModel;
        if (!empty($request)) {
            $dadosArtigos = $artigos->selecionar($request);
        } else {
            $dadosArtigos = $artigos->selecionar();
        }

        if ($dadosArtigos) {

            $artigoPreviewComponent = file_get_contents(PUBLIC_PATH . '//components//artigoPreview.html');
            $artigoPreviewReplaces  = array();
            $listaArtigosDestaque   = "";

            foreach ($dadosArtigos as $artigo) {
                $this->viewData['PAGE_HEAD']     = file_get_contents(PUBLIC_PATH . "/pages/head.html");
                $this->viewData['STATICS_PATH']  = STATICS_PATH;
                $this->viewData['STATICS_PATH']  = STATICS_PATH;
                $this->viewData['titulo_pagina'] = 'Prepare-se para a faculdade - Português para Vestibular';

                $artigoPreviewReplaces['titulo_artigo']     = $artigo['titulo'];
                $artigoPreviewReplaces['descricao_artigo']  = $artigo['descricao'];
                $artigoPreviewReplaces['autor_artigo']      = $artigo['autor'];
                $artigoPreviewReplaces['categoria']         = $artigo['categoria'];
                $artigoPreviewReplaces['capa_artigo']       = $artigo['capa'];
                $artigoPreviewReplaces['publicacao_artigo'] = date("d-m-Y", strtotime($artigo['data_criacao']));
                $artigoPreviewReplaces['alteracao_artigo']  = date("d-m-Y", strtotime($artigo['data_ultima_modificacao']));

                $listaArtigosDestaque .= Julia::mergeDataView($artigoPreviewComponent, $artigoPreviewReplaces);

                $artigoPreviewReplaces['titulo_artigo']     = "";
                $artigoPreviewReplaces['descricao_artigo']  = "";
                $artigoPreviewReplaces['autor_artigo']      = "";
                $artigoPreviewReplaces['categoria']         = "";
                $artigoPreviewReplaces['capa_artigo']       = "";
                $artigoPreviewReplaces['publicacao_artigo'] = "";
                $artigoPreviewReplaces['alteracao_artigo']  = "";
            }

            $this->viewData['LISTA_ARTIGOS_DESTAQUE'] = $listaArtigosDestaque;
        } else {
            exit(file_get_contents(PUBLIC_PATH . '/errors/404.html'));
        }
    }

    /** Cria um novo artigo
     * @return void
     */
    public function store($request)
    {
        $artigos = new ArtigosModel;
    }

    /** Seleciona um artigo pelo ID
     * @return void
     */
    public function show($request)
    {
        $artigos = new ArtigosModel;
    }

    /** Atualiza um artigo pelo ID
     * @return void
     */
    public function update($request)
    {
        $artigos = new ArtigosModel;
    }

    /** Deleta um artigo pelo ID
     * @return void
     */
    public function destroy($request)
    {
        $artigos = new ArtigosModel;
    }
}
