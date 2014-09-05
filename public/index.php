<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * @package     EGC Services Ltd
 * @version     $Id: index.php Aug 15, 2014 ahmet
 * @copyright   Copyright (c) 2014 EGC Services Ltd .
 * @license     http://www.semiteproject.com/license/
 */
/**
 * Description of index.php
 *
 * @author ahmet
 */
// Version
define('VERSION', '1.5.6.3');

// Basic setup

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('PS') || define('PS', PATH_SEPARATOR);
defined('_ENGINE') || define('_ENGINE', true);
defined('_ENGINE_REQUEST_START') ||
        define('_ENGINE_REQUEST_START', microtime(true));
defined('APPLICATION_PATH_COR') ||
        define('APPLICATION_PATH_COR', realpath(dirname(__DIR__)) . '/');

// Configuration
if (file_exists(APPLICATION_PATH_COR . 'system/config/public.php')) {
    require_once(APPLICATION_PATH_COR . 'system/config/public.php');
} else {
    trigger_error('Configuration file con not be located!');
}

// Configuration
if (file_exists(DIR_SYSTEM . 'startup.php')) {
    require_once(DIR_SYSTEM . 'startup.php');
} else {
    trigger_error('Startup file con not be located!');
}

// Registry
$registry = new Registry();

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);

// Config
$config = new Config();
$registry->set('config', $config);
