<?php

use base\Router;

Router::add('^(?P<lang>[a-z]{2}+)?/?admin/?$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);

Router::add('^(?P<lang>[a-z]{2}+)?/?admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^(?P<lang>[a-z]{2}+)?/?$', ['controller' => 'Main', 'action' => 'index']);

Router::add('^((?P<lang>[a-z]{2})/)?(?P<controller>[a-z-]+)/?$', ['action' => 'index']);

Router::add('^((?P<lang>[a-z]{2})/)?(?P<controller>[a-z-]+)/(?P<slug>[a-z0-9-]+)/?$', ['action' => 'index']);

Router::add('^((?P<lang>[a-z]{2})/)?(?P<controller>[a-z-]+)/(?P<slug>[ex0-9]{4,5})/?$', ['action' => 'index']);
