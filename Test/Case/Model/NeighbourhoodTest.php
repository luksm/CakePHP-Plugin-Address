<?php
App::uses('Neighbourhood', 'Address.Model');

/**
 * Neighbourhood Test Case
 *
 */
class NeighbourhoodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.address.neighbourhood',
		'plugin.address.city'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Neighbourhood = ClassRegistry::init('Address.Neighbourhood');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Neighbourhood);

		parent::tearDown();
	}

}
