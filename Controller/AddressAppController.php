<?php
/**
 * Addresses Plugin Controller
 *
 * This file is plugin-wide controller file.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category  Plugin
 * @package   AddressesController
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Addresses
 */

App::uses('AppController', 'Controller');

/**
 * Addresses Plugin Controller
 *
 * Plugin-wide methods in the class below
 *
 * @category  Plugin
 * @package   AddressesController
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Addresses
 */
class AddressAppController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    var $components = array('Session') ;

    /**
     * beforeFilter callback
     *
     * @return void
     */
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

}
