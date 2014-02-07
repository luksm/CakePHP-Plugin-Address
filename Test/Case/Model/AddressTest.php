<?php
App::uses('Address', 'Address.Model');

/**
 * Address Test Case
 *
 */
class AddressTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.address.address',
		'plugin.address.neighborhood',
		'plugin.address.city'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Address = ClassRegistry::init('Address.Address');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Address);

		parent::tearDown();
	}

}
