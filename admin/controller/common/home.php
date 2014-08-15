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
 * Description of home Class
 *
 * @author ahmet
 */
class ControllerCommonHome extends Controller {

    public function index() {

        $this->language->load('common/home');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->data['heading_title'] = $this->language->get('heading_title');

        // Check install directory exists
        if (is_dir(dirname(DIR_APPLICATION) . '/install')) {
            $this->data['error_install'] = $this->language->get('error_install');
        } else {
            $this->data['error_install'] = '';
        }

        // Check image directory is writable
        $file = DIR_IMAGE . 'test';

        $handle = fopen($file, 'a+');

        fwrite($handle, '');

        fclose($handle);

        if (!file_exists($file)) {
            $this->data['error_image'] = sprintf($this->language->get('error_image'), DIR_IMAGE);
        } else {
            $this->data['error_image'] = '';

            unlink($file);
        }

        // Check image cache directory is writable
        $file = DIR_IMAGE . 'cache/test';

        $handle = fopen($file, 'a+');

        fwrite($handle, '');

        fclose($handle);

        if (!file_exists($file)) {
            $this->data['error_image_cache'] = sprintf($this->language->get('error_image_cache'), DIR_IMAGE . 'cache/');
        } else {
            $this->data['error_image_cache'] = '';

            unlink($file);
        }

        // Check cache directory is writable
        $file = DIR_CACHE . 'test';

        $handle = fopen($file, 'a+');

        fwrite($handle, '');

        fclose($handle);

        if (!file_exists($file)) {
            $this->data['error_cache'] = sprintf($this->language->get('error_image_cache'), DIR_CACHE);
        } else {
            $this->data['error_cache'] = '';

            unlink($file);
        }

        // Check download directory is writable
        $file = DIR_DOWNLOAD . 'test';

        $handle = fopen($file, 'a+');

        fwrite($handle, '');

        fclose($handle);

        if (!file_exists($file)) {
            $this->data['error_download'] = sprintf($this->language->get('error_download'), DIR_DOWNLOAD);
        } else {
            $this->data['error_download'] = '';

            unlink($file);
        }

        // Check logs directory is writable
        $file = DIR_LOGS . 'test';

        $handle = fopen($file, 'a+');

        fwrite($handle, '');

        fclose($handle);

        if (!file_exists($file)) {
            $this->data['error_logs'] = sprintf($this->language->get('error_logs'), DIR_LOGS);
        } else {
            $this->data['error_logs'] = '';

            unlink($file);
        }

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['token'] = $this->session->data['token'];
        
        
        if ($this->config->get('config_currency_auto')) {
            $this->load->model('localisation/currency');

            $this->model_localisation_currency->updateCurrencies();
        }
        
        $this->template = 'common/home.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    public function login() {
        $route = '';

        if (isset($this->request->get['route'])) {
            $part = explode('/', $this->request->get['route']);

            if (isset($part[0])) {
                $route .= $part[0];
            }

            if (isset($part[1])) {
                $route .= '/' . $part[1];
            }
        }

        $ignore = array(
            'common/login',
            'common/forgotten',
            'common/reset'
        );

        if (!$this->user->isLogged() && !in_array($route, $ignore)) {
            return $this->forward('common/login');
        }

        if (isset($this->request->get['route'])) {
            $ignore = array(
                'common/login',
                'common/logout',
                'common/forgotten',
                'common/reset',
                'error/not_found',
                'error/permission'
            );

            $config_ignore = array();

            if ($this->config->get('config_token_ignore')) {
                $config_ignore = unserialize($this->config->get('config_token_ignore'));
            }

            $ignore = array_merge($ignore, $config_ignore);

            if (!in_array($route, $ignore) && (!isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token']))) {
                return $this->forward('common/login');
            }
        } else {
            if (!isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token'])) {
                return $this->forward('common/login');
            }
        }
    }

    public function permission() {
        if (isset($this->request->get['route'])) {
            $route = '';

            $part = explode('/', $this->request->get['route']);

            if (isset($part[0])) {
                $route .= $part[0];
            }

            if (isset($part[1])) {
                $route .= '/' . $part[1];
            }

            $ignore = array(
                'common/home',
                'common/login',
                'common/logout',
                'common/forgotten',
                'common/reset',
                'error/not_found',
                'error/permission'
            );

            if (!in_array($route, $ignore) && !$this->user->hasPermission('access', $route)) {
                return $this->forward('error/permission');
            }
        }
    }

}
