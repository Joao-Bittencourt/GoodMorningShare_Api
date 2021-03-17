<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ImagensController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TipoPessoasController Test Case
 *
 * @uses \App\Controller\ImagensController
 */
class ImagensControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Imagens',
    ];

    /**
     * Test listar method
     *
     * @return void
     */
    public function testlistar(): void {
        $this->get('/imagens/listar');
        $this->assertResponseCode(200);
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testDetalhar(): void {
        $this->get('/imagens/detalhar/1');
        $this->assertResponseCode(200);
    }

    /**
     * Test detalhar method
     *
     * @return void
     */
    public function testDetalharSemId(): void {
        $this->get('/imagens/detalhar/');
        $this->assertResponseCode(400);
    }

    /**
     * Test add method
     *
     * @return void
     */
//    public function testAdicionarComErro(): void {
//
//        $data = [
//            'nome' => 'Lorem ipsum dolor sit amet',
//            'url' => 'https://teste.com',
//            'created' => '2021-02-20 17:36:46',
//            'created_by' => 1,
//            'modified' => '2021-02-20 17:36:46',
//            'modified_by' => 1,
//            'status' => 'status 1',
//        ];
//
//        $this->post('/imagens/adicionar/', ['data' => $data]);
//        $this->assertResponseCode(400);
//    }
    
    /**
     * Test add method
     *
     * @return void
     */
    public function testAdicionar(): void {

        $data = [
            'nome' => 'Lorem ipsum dolor sit amet',
            'url' => 'https://teste.com',
            'created' => '2021-02-20 17:36:46',
            'created_by' => 1,
            'modified' => '2021-02-20 17:36:46',
            'modified_by' => 1,
            'status' => 1,
        ];

        $this->post('/imagens/adicionar/', ['data' => $data]);
        $this->assertResponseCode(200);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdicionarGet(): void {
        $this->get('/imagens/adicionar/');
        $this->assertResponseCode(200);
    }
    
    /**
     * Test add method
     *
     * @return void
     */
    public function testImportar(): void {
        $this->get('/imagens/importar/');
        $this->assertResponseCode(200);
    }
    /**
     * Test add method
     *
     * @return void
     */
    public function testImportarMany(): void {
        $this->get('/imagens/importarMany/');
        $this->assertResponseCode(200);
    }

}
