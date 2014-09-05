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
 * @version     $Id: login.php Sep 3, 2014 ahmet
 * @copyright   Copyright (c) 2014 EGC Services Ltd .
 * @license     http://www.semiteproject.com/license/
 */
/**
 * Description of login.php
 *
 * @author ahmet
 */
// header
$_['heading_title']  = 'Administration';

// Text
$_['text_heading']   = 'Administration';
$_['text_login']     = 'Please enter your login details.';
$_['text_forgotten'] = 'Forgot your password?';
$_['text_remember'] = 'Remember me';
$_['text_two_factor'] = '<a id="getkey" class="btn btn-info btn-sm">Request Key Auth Token</a>';

// Entry
$_['entry_username'] = 'Enter username';
$_['entry_password'] = 'Enter password';
$_['entry_two_factor'] = 'Two Factor (optional)';

// Success
$_['key_success'] = 'Your Key Auth Toke has been sent to you via SMS.';

// Button
$_['button_login']   = 'Login';

// Error
$_['error_login']    = 'No match for Username and/or Password.';
$_['error_two_factor']    = 'Two Factor Authentication Faild.';
$_['error_token']    = 'Invalid token session. Please login again.';
$_['error_key_enabled']    = 'Two Factor Authentication has not enabled for your account.';
$_['error_message']    = 'Two Factor Authentication could not be sent.';
