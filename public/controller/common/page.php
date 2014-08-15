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
 * Description of page Class
 *
 * @author ahmet
 */
class ControllerCommonPage extends Controller {
    
    
    public function index(){
        
        $this->load->model('design/page');
        
        $page_info = $this->model_design_page->getPage($this->page_id);
        
        if ($page_info){
            $this->page->setPage($page_info);
        } else {
            return false;
        }
        
    }
}
