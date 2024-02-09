<?php
define('SRC_PATH', '/app/src');
require_once 'app/src/controller/ArtigosController.php';
require_once "app/src/model/ArtigosModel.php";

class ArtigosControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testIndexWithQueryString()
    {
        $mockArtigosModel = $this->getMockBuilder('ArtigosModel')
            ->getMock();

        $mockArtigosModel->method('selecionar')
            ->with('your_expected_query_string')
            ->willReturn(['your', 'mocked', 'data']);

        $mockArtigosModel->expects($this->once())->method('selecionar');

        $controller           = new ArtigosController();
        $controller->viewData = [];

        $result = $controller->index();

        $this->assertEquals('Testing String', $controller->viewData['titulo_pagina']);
        $this->assertEquals('Testing String', $controller->viewData['titulo_artigo']);
        $this->assertEquals('Testing String', $controller->viewData['descricao_artigo']);
        $this->assertEquals('Testing String', $controller->viewData['autor_artigo']);
        $this->assertEquals('Testing String', $controller->viewData['publicacao_artigo']);
        $this->assertEquals('Testing String', $controller->viewData['alteracao_artigo']);
    }
}
