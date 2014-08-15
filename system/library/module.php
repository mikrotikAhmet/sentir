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
 * Description of module Class
 *
 * @author ahmet
 */
class Module {
    
    private $block_module;
    
    public function __construct($registry) {
        $this->db = $registry->get('db');
        $this->config = $registry->get('config');
    }
    
    public function setModule($code) {
        
        $result = $this->db->query("SELECT * FROM ".DB_PREFIX."extension WHERE extension_id = '".(int) $code."'");
        
        $this->block_module = $result->row['code'];
        
    }
    
    public function getModule(){
        return $this->block_module;
    }
}
