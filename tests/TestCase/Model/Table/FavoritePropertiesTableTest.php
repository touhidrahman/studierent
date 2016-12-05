<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavoritePropertiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavoritePropertiesTable Test Case
 */
class FavoritePropertiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FavoritePropertiesTable
     */
    public $FavoriteProperties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.favorite_properties',
        'app.users',
        'app.cities',
        'app.feedbacks',
        'app.properties',
        'app.zips',
        'app.images',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FavoriteProperties') ? [] : ['className' => 'App\Model\Table\FavoritePropertiesTable'];
        $this->FavoriteProperties = TableRegistry::get('FavoriteProperties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FavoriteProperties);

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
