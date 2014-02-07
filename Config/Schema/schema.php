<?php
class AddressSchema extends CakeSchema
{

    /**
     * before
     *
     * @param array $event The event that has just happened
     *
     * @return bool
     */
    public function before($event = array())
    {
        return true;
    }

    /**
     * after
     *
     * @param array $event The event that has just happened
     *
     * @return bool
     */
    public function after($event = array())
    {
    }

    public $address_addresses = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'information' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'zip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
        'neighbourhood_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
            'zip' => array('column' => 'zip', 'unique' => 1),
            'neighbourhood_id' => array('column' => 'neighbourhood_id', 'unique' => 0),
            'city_id' => array('column' => 'city_id', 'unique' => 0)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $address_cities = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'state_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'capital' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $address_countries = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'country' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'abbr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $address_neighbourhoods = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
        'neighbourhood' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
            'city_id' => array('column' => 'city_id', 'unique' => 0)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $address_states = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'country_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'fu' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

}
