<?php
/**
 * AddressFixture
 *
 */
class AddressFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'zip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'neighborhood_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'city_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'zip' => array('column' => 'zip', 'unique' => 1),
			'neighborhood_id' => array('column' => array('neighborhood_id', 'city_id'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'address' => 'Lorem ipsum dolor sit amet',
			'zip' => 'Lorem i',
			'neighborhood_id' => 1,
			'city_id' => 1
		),
	);

}
