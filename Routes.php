<?php

/**
 *
 * Routes
 *
 */
$this->router->add('home', '/', 'HomeController:index');
$this->router->add('news', '/news/{id:int}', 'HomeController:news');