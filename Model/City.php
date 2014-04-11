<?php
/**
 * City Model for Address Plugin
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
 * City Model
 *
 * @category  Plugin
 * @package   AddressModel
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Address
 * @property State $State
 */
class City extends AddressAppModel
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
    public $displayField = 'city';


    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'state_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'city' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'capital' => array(
            'boolean' => array(
                'rule' => array('boolean'),
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
        'State' => array(
            'className' => 'Address.State',
            'foreignKey' => 'state_id',
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
        'Neighbourhood' => array(
            'className' => 'Address.Neighbourhood',
            'foreignKey' => 'city_id',
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
     * before Save
     *
     * We'll generate the slug
     *
     * @param array $options Array of Options
     *
     * @return boolean
     */
    public function beforeSave($options = array()) {
        if (!empty($this->data['City']['city'])) {
            $this->data['City']['slug'] = strtolower(Inflector::slug($this->data['City']['city'], $replacement = '_'));
        }
        return true;
    }

    /**
     * getByState
     *
     * Filter cities by state abbr
     *
     * @param string $state Abbr
     *
     * @return array of states
     *
     */
    public function getByState($state)
    {
        $return = false;
        $state = $this->State->find('first', array('conditions' => array('fu' => $state), 'recursive' => -1));

        if ($state) {
            $return = $this->find(
                'list',
                array(
                    'conditions' => array(
                        "state_id" => $state['State']['id']
                    )
                )
            );
        }

        return $return;
    }

    /**
     *
     */
    public function listCitiesAndState()
    {
         $this->unbindModel(array('hasMany' => array('Neighbourhood')));
         return $this->find("all", array("order" => "city ASC"));
    }
}
