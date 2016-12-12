<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvgRatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvgRatingsTable Test Case
 */
class AvgRatingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AvgRatingsTable
     */
    public $AvgRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.avg_ratings',
        'app.users',
        'app.cities',
        'app.favorite_properties',
        'app.properties',
        'app.zips',
        'app.images',
        'app.feedbacks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AvgRatings') ? [] : ['className' => 'App\Model\Table\AvgRatingsTable'];
        $this->AvgRatings = TableRegistry::get('AvgRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AvgRatings);

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
