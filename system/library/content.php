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
 * Description of content Class
 *
 * @author ahmet
 */
class Content {

    private $content_data = array();
    private $title;
    private $image;
    private $content;
    private $glyp_icon;
    private $replace_image;
    private $type = array();

    public function __construct($registry) {

        require_once DIR_APPLICATION . 'model/tool/image.php';

        $this->db = $registry->get('db');
        $this->imager = new ModelToolImage($registry);
        $this->request = $registry->get('request');
        $this->session = $registry->get('session');
        $this->config = $registry->get('config');
    }

    public function setContent($content_id) {

        $this->content_data = $this->db->query("SELECT * FROM " . DB_PREFIX . "content c LEFT JOIN " . DB_PREFIX . "content_description cd ON(c.content_id = cd.content_id) WHERE cd.language_id = '" . (int) $this->config->get('config_language_id') . "' AND c.content_id = '" . (int) $content_id . "'");
    
        $this->glyp_icon = $this->content_data->row['glyp_icon'];
        $this->replace_image = $this->content_data->row['replace_image'];
    }

    public function getTitle() {

        if ($this->getType('title')){
            return $this->content_data->row['title'];
        } else {
            return false;
        }
    }

    public function getContent() {
        if ($this->getType('description')){
            return html_entity_decode($this->content_data->row['description'], ENT_QUOTES, 'UTF-8');
        } else {
            return false;
        }
    }
    
    public function getImage($width = "100", $heigth = "100") {
        if ($this->getType('image')){
            if (file_exists(DIR_IMAGE . $this->content_data->row['image'])) {
            $this->image = $this->imager->resize($this->content_data->row['image'], $width, $heigth);
                } else {
                    $this->image = null;
                }

            return $this->image;
        } else {
            return false;
        }
    }
    
    public function getReplaceImage(){
        
        return $this->replace_image;
    }
    
    public function getGlypIcon(){
        return $this->glyp_icon;
    }

    protected function getType($field) {
        
        $content_type_fields = $this->db->query("SELECT * FROM ".DB_PREFIX."content_type_field WHERE content_type_id = '".(int) $this->content_data->row['type']."' AND `field` = '".$this->db->escape($field)."' AND status = '1'"); 

        return count($content_type_fields->row);
        
    }

}
