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
 * Description of response Class
 *
 * @author ahmet
 */
class Response {

    private $headers = array();
    private $level = 0;
    private $output;
    private $_isPageExist = true;

    public function addHeader($header) {
        $this->headers[] = $header;
    }

    public function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

    public function setCompression($level) {
        $this->level = $level;
    }

    public function setOutput($output) {
        $this->output = $output;
    }

    private function compress($data, $level = 0) {
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false)) {
            $encoding = 'gzip';
        }

        if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') !== false)) {
            $encoding = 'x-gzip';
        }

        if (!isset($encoding)) {
            return $data;
        }

        if (!extension_loaded('zlib') || ini_get('zlib.output_compression')) {
            return $data;
        }

        if (headers_sent()) {
            return $data;
        }

        if (connection_status()) {
            return $data;
        }

        $this->addHeader('Content-Encoding: ' . $encoding);

        return gzencode($data, (int) $level);
    }

    public function output() {
        if ($this->output) {
            if ($this->level) {
                $output = $this->compress($this->output, $this->level);
            } else {
                $output = $this->output;
            }

            if (!headers_sent()) {
                foreach ($this->headers as $header) {
                    header($header, true);
                }
            }

            echo $output;
        }
    }
    
       public function set_isPageExist($value){
        
        $this->_isPageExist = $value;
    }
    
    public function isPageExist(){
        return $this->_isPageExist;
    }

}
