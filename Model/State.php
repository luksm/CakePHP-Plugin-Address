<?php
/**
 * State Model for Address Plugin
 *
 * This file is a model file to manage all the cities.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category  Plugin
 * @package   AddressModel
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Address
 */

App::uses('AddressAppModel', 'Address.Model');

/**
 * State Model
 *
 * @category  Plugin
 * @package   AddressModel
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Address
 *
 * @property Country $Country
 * @property City $City
 */
class State extends AddressAppModel
{

    /**
     * Defines the prefix for the table
     *
     * @var string
     */
    public $tablePrefix = 'address_';

    /**
     * Defines the display Field
     *
     * @var string
     */
    public $displayField = 'state';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'country_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'state' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'fu' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Country' => array(
            'className' => 'Address.Country',
            'foreignKey' => 'country_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'City' => array(
            'className' => 'Address.City',
            'foreignKey' => 'state_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    /**
     * getByCountry
     *
     * Filter states by country abbr
     *
     * @param string $country Abbr
     *
     * @return array of states
     *
     */
    public function getByCountry($country)
    {
        $return = false;
        $country = $this->Country->find('first', array('conditions' => array('abbr' => $country), 'recursive' => -1));

        if ($country) {
            $return = $this->find(
                'list',
                array(
                    'conditions' => array(
                        "country_id" => $country['Country']['id']
                    )
                )
            );
        }

        return $return;
    }
}
