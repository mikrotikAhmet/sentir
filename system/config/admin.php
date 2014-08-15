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
 * @version     $Id: admin.php Aug 15, 2014 ahmet
 * @copyright   Copyright (c) 2014 EGC Services Ltd .
 * @license     http://www.semiteproject.com/license/
 */
/**
 * Description of admin.php
 *
 * @author ahmet
 */
// HTTP
define('HTTP_SERVER', 'http://'.$_SERVER['HTTP_HOST'].'/admin/');
define('HTTP_PUBLIC', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('HTTP_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/image/');

// HTTPS
define('HTTPS_SERVER', 'https://'.$_SERVER['HTTP_HOST'].'/admin/');
define('HTTPS_PUBLIC', 'https://'.$_SERVER['HTTP_HOST'].'/');
define('HTTPS_IMAGE', 'https://'.$_SERVER['HTTP_HOST'].'/image/');

// DIR
define('DIR_APPLICATION', APPLICATION_PATH_COR.'admin/');
define('DIR_SYSTEM', APPLICATION_PATH_COR.'system/');
define('DIR_LIBRARY', APPLICATION_PATH_COR.'system/library/');
define('DIR_DATABASE', APPLICATION_PATH_COR.'system/database/');
define('DIR_TEMPLATE', APPLICATION_PATH_COR.'admin/view/template/');
define('DIR_LANGUAGE', APPLICATION_PATH_COR.'admin/language/');
define('DIR_CONFIG', APPLICATION_PATH_COR.'system/library/config/');
define('DIR_IMAGE', APPLICATION_PATH_COR.'image/');
define('DIR_CACHE', APPLICATION_PATH_COR.'system/cache/');
define('DIR_DOWNLOAD', APPLICATION_PATH_COR.'download/');
define('DIR_LOGS', APPLICATION_PATH_COR.'system/logs/');
define('DIR_PUBLIC', APPLICATION_PATH_COR.'public/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'sentir');
define('DB_PASSWORD', 'devel2014');
define('DB_DATABASE', 'sentir');
define('DB_PREFIX', 'engine4_');
