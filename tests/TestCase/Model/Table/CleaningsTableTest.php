<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CleaningsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CleaningsTable Test Case
 */
class CleaningsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CleaningsTable
     */
    public $Cleanings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cleanings',
        'app.assets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cleanings') ? [] : ['className' => CleaningsTable::class];
        $this->Cleanings = TableRegistry::get('Cleanings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cleanings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
