<?php

require_once SRC_PATH . "/model/ArtigosModel.php";

class ArtigosController
{
/** Seleciona diversos artigos
 * @return array
 */
    public function index()
    {
        $artigos = new ArtigosModel;
        return $artigos->selecionar(QUERY_STRING);
    }

    /** Cria um novo artigo
     * @return void
     */
    public function store()
    {
        $artigos = new ArtigosModel;
    }

    /** Seleciona um artigo pelo ID
     * @return string
     */
    public function show()
    {
        $artigos = new ArtigosModel;
    }

    /** Atualiza um artigo pelo ID
     * @return string
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
