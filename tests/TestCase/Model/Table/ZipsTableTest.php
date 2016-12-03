<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZipsTable Test Case
 */
class ZipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZipsTable
     */
    public $Zips;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zips',
        'app.cities',
        'app.properties',
        'app.favorite_properties',
        'app.images',
        'app.reports',
        'app.users',
        'app.feedbacks',
        'app.users_properties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zips') ? [] : ['className' => 'App\Model\Table\ZipsTable'];
        $this->Zips = TableRegistry::get('Zips', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zips);

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
