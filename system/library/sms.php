<?php

if (!defined('DIR_APPLICATION'))
    exit('No direct script access allowed');

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
 * Description of sms Class
 *
 * @author ahmet
 */
class Sms {
    
    private $username;
    private $password;
    private $api_id;
    private $end_point;
    
    public function __construct($registry) {
        
        $this->db = $registry->get('db');
        $this->imager = new ModelToolImage($registry);
        $this->request = $registry->get('request');
        $this->session = $registry->get('session');
        $this->encryption = $registry->get('encryption');
        
        $this->username = 'semitellc';
        $this->password = 'ZePFFHQAQQgQIF';
        $this->api_id = '3497179';
        $this->end_point = 'http://api.clickatell.com';
    }
}
