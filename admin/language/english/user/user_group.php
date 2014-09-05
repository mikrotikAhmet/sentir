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
 * @version     $Id: account_permission.php Sep 4, 2014 ahmet
 * @copyright   Copyright (c) 2014 EGC Services Ltd .
 * @license     http://www.semiteproject.com/license/
 */
/**
 * Description of account_permission.php
 *
 * @author ahmet
 */
// Heading
$_['heading_title']     = 'User Group';

// Text
$_['text_success']      = 'Success: You have modified user groups!';
$_['text_assign'] = '<strong>Note :</strong> You can assign multiple Applications for this account to manage.';

// Column
$_['column_name']       = 'User Group Name';
$_['column_action']     = 'Action';

// Entry
$_['entry_name']        = 'User Group Name:';
$_['entry_application']        = 'Select an Application:';
$_['entry_access']      = 'Access Permission:';
$_['entry_modify']      = 'Modify Permission:';

// Error
$_['error_permission']  = 'Warning: You do not have permission to modify user groups!';
$_['error_name']        = 'User Group Name must be between 3 and 64 characters!';
$_['error_user']        = 'Warning: This user group cannot be deleted as it is currently assigned to %s users!';
