<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category  Plugin
 * @package   AddressRoutes
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Address
 */

    Router::connect(
        '/admin/address',
        array(
            'plugin' => 'address',
            'prefix' => 'admin',
            'controller' => 'addresses',
            'action' => 'index',
        )
    );

    Router::connect(
        '/admin/address/states',
        array(
            'plugin' => 'address',
            'prefix' => 'admin',
            'controller' => 'states',
            'action' => 'index',
        )
    );

    Router::connect(
        '/admin/address/cities',
        array(
            'plugin' => 'address',
            'prefix' => 'admin',
            'controller' => 'cities',
            'action' => 'index',
        )
    );

    Router::connect(
        '/admin/address/neighbourhoods',
        array(
            'plugin' => 'address',
            'prefix' => 'admin',
            'controller' => 'neighbourhoods',
            'action' => 'index',
        )
    );

    Router::connect(
        '/admin/address/countries',
        array(
            'plugin' => 'address',
            'prefix' => 'admin',
            'controller' => 'countries',
            'action' => 'index',
        )
    );
