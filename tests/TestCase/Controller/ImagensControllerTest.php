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
class ImagensControllerTest extends TestCase
{
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
    public function testlistar(): void
    {
        $this->get('/imagens/listar');
        $this->assertResponseCode(200);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdicionar(): void
    {
        $this->get('/imagens/adicionar/1');
        $this->assertResponseCode(200);
    }

}
