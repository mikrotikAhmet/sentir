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
class Page {

    private $page;
    private $page_id;
    private $page_title;
    private $page_header;
    private $page_sub_title;
    private $featured;
    private $description;
    private $keyword;
    private $page_blocks = array();

    public function __construct($registry) {



        $this->db = $registry->get('db');
        $this->request = $registry->get('request');
        $this->session = $registry->get('session');
        $this->config = $registry->get('config');
        $this->load = $registry->get('load');

        require_once DIR_APPLICATION . 'model/tool/image.php';

        $this->imager = new ModelToolImage($registry);
    }

    public function setPage($page) {
        $this->page = $page;

        $this->setPageId($this->page['page_id']);
        $this->setPageTitle($this->page['title']);
        $this->setPageSubTitle($this->page['sub_title']);
        $this->setFeatured($this->page['image']);
        $this->setDescription($this->page['meta_description']);
        $this->setKeyword($this->page['meta_keyword']);
        $this->setPageHeader($this->page['show_header']);
    }

    public function getPage() {
        return $this->page;
    }

    public function setPageId($page_id) {
        $this->page_id = $page_id;
    }

    public function getPageId() {
        return $this->page_id;
    }

    public function setPageTitle($page_title) {
        $this->page_title = $page_title;
    }

    public function getPageTitle() {
        if ($this->page['show_title']) {

            return $this->page_title;
        } else {
            return false;
        }
    }

    public function setPageSubTitle($page_sub_title) {
        $this->page_sub_title = $page_sub_title;
    }

    public function getPageSubTitle() {
        if ($this->page['show_sub_title']) {

            return $this->page_sub_title;
        } else {
            return false;
        }
    }

    public function setFeatured($featured) {

        if (isset($featured) && file_exists(DIR_IMAGE . $featured)) {
            $this->featured = $this->imager->resize($featured, 1170, 239);
        } else {
            return false;
        }
    }

    public function getFeatured() {

        if ($this->featured) {
            $featured = '<img src="' . $this->featured . '"/>';

            return $featured;
        } else {
            return false;
        }
    }
    
    public function setDescription($description){
        
        $this->description = $description;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setKeyword($keyword){
        
        $this->keyword = $keyword;
    }
    
    public function getKeyword(){
        return $this->keyword;
    }
    
    public function setPageHeader($page_header){
        
        $this->page_header = $page_header;
    }
    
    public function getPageHeader(){
        return $this->page_header;
    }


    public function getPageBlocks(){
        
        $results = $this->db->query("SELECT * FROM ".DB_PREFIX."page_to_block WHERE page_id = '".(int) $this->page_id."'");
        
        
        return $results->rows;
    }

}
