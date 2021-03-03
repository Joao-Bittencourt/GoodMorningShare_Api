<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagensTable Test Case
 */
class ImagensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagensTable
     */
    protected $Imagens;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Imagens',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Imagens') ? [] : ['className' => ImagensTable::class];
        $this->Imagens = $this->getTableLocator()->get('Imagens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Imagens);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
