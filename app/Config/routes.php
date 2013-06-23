<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'welcomes', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Redirection sur les URLs de la galerie*****
 *///*
$urls = array(
    '/Cours-photo/:id-:slug/*?page=:page&sort=:sort&direction=:direction&nbr=:nbr/*',
    '/Cours-photo/:id-:slug/*?sort=:sort&direction=:direction&nbr=:nbr/*',
    '/Cours-photo/:id-:slug/*?page=:page&nbr=:nbr/*',
    '/Cours-photo/:id-:slug/*?page=:page/*',
    '/Cours-photo/:id-:slug/*?nbr=:nbr/*',
    '/Cours-photo/:id-:slug/*',
);
foreach ($urls as $url) {
    Router::connect($url, array('controller' => 'categories', 'action' => 'index'), array('pass' => array('id', 'slug'), 'id' => '[0-9]+', 'slug' => '[a-z0-9\-]+', 'page' => '[0-9]+', 'sort' => '[a-zA-Z0-9\.]+', 'direction' => '[a-zA-Z]{3,4}', 'nbr' => '[0-9]{2,3}'));
}//*/

/**
 * Redirection sur les URLs de la galerie*****
 */
$urls = array(
    '/Cours-photo/*?page=:page&sort=:sort&direction=:direction&nbr=:nbr/*',
    '/Cours-photo/*?sort=:sort&direction=:direction&nbr=:nbr/*',
    '/Cours-photo/*?page=:page&nbr=:nbr/*',
    '/Cours-photo/*?page=:page/*',
    '/Cours-photo/*?nbr=:nbr/*',
    '/Cours-photo/*',
);
foreach ($urls as $url) {
    Router::connect($url, array('controller' => 'categories', 'action' => 'index'), array('page' => '[0-9]+', 'sort' => '[a-zA-Z0-9\.]+', 'direction' => '[a-zA-Z0-9]{3,4}', 'nbr' => '[0-9]{2,3}'));
}
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
