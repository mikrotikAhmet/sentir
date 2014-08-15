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
 * Description of controller Class
 *
 * @author ahmet
 */
abstract class Controller {

    protected $registry;
    protected $id;
    protected $layout;
    protected $page_id;
    protected $template;
    protected $children = array();
    protected $data = array();
    protected $output;

    public function __construct($registry) {
        
        $this->registry = $registry;
        $this->db = $registry->get('db');
        $this->config = $registry->get('config');
        $this->request = $registry->get('request');
        
               // Decode URL
        if (isset($this->request->get['_route_'])) {
            
            $parts = explode('/', $this->request->get['_route_']);
            
            foreach ($parts as $part) {
                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE keyword = '" . $this->db->escape($part) . "'");

                if ($query->num_rows) {
                    $url = explode('=', $query->row['query']);

                    if ($url[0] == 'page_id') {
                        $this->page_id = $url[1];
                        
                    }

                } else {
                    $this->page_id = $this->config->get('config_page_id');
                }
            }
        } elseif (!isset($this->request->get['_route_']) && !isset($this->request->get['page_id'])) {
            
            $this->page_id = $this->config->get('config_page_id');
        } else {
            $this->page_id = $this->request->get['page_id'];
        }

        
    }

    public function __get($key) {
        return $this->registry->get($key);
    }

    public function __set($key, $value) {
        $this->registry->set($key, $value);
    }

    protected function forward($route, $args = array()) {
        return new Action($route, $args);
    }

    protected function redirect($url, $status = 302) {
        header('Status: ' . $status);
        header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url));
        exit();
    }

    protected function getChild($child, $args = array()) {
        $action = new Action($child, $args);

        if (file_exists($action->getFile())) {
            require_once($action->getFile());

            $class = $action->getClass();

            $controller = new $class($this->registry);

            $controller->{$action->getMethod()}($action->getArgs());

            return $controller->output;
        } else {
            trigger_error('Error: Could not load controller ' . $child . '!');
            exit();
        }
    }

    protected function hasAction($child, $args = array()) {
        $action = new Action($child, $args);

        if (file_exists($action->getFile())) {
            require_once($action->getFile());

            $class = $action->getClass();

            $controller = new $class($this->registry);

            if (method_exists($controller, $action->getMethod())) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    protected function render() {
        foreach ($this->children as $child) {
            $this->data[basename($child)] = $this->getChild($child);
        }

        if (file_exists(DIR_TEMPLATE . $this->template)) {
            extract($this->data);

            ob_start();

            require(DIR_TEMPLATE . $this->template);

            $this->output = ob_get_contents();

            ob_end_clean();

            return $this->output;
        } else {
            trigger_error('Error: Could not load template ' . DIR_TEMPLATE . $this->template . '!');
            exit();
        }
    }

}
