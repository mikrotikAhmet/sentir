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
 * Description of maintenance Class
 *
 * @author ahmet
 */
class ControllerCommonMaintenance extends Controller {
	public function index() {
            
		if ($this->config->get('config_maintenance')) {
			$route = '';

			if (isset($this->request->get['route'])) {
				$part = explode('/', $this->request->get['route']);

				if (isset($part[0])) {
					$route .= $part[0];
				}			
			}

			// Show site if logged in as admin
			$this->load->library('user');

			$this->user = new User($this->registry);

			if (($route != 'payment') && !$this->user->isLogged()) {
				return $this->forward('common/maintenance/info');
			}						
		}
	}

	public function info() {
		$this->language->load('common/maintenance');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->document->breadcrumbs = array();

		$this->document->breadcrumbs[] = array(
			'text'      => $this->language->get('text_maintenance'),
			'href'      => $this->url->link('common/maintenance'),
			'separator' => false
		);

		$this->data['message'] = $this->language->get('text_message');
                $this->data['maintenance'] = $this->language->get('text_maintenance');
                $this->data['sub_maintenance'] = $this->language->get('text_sub_maintenance');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/maintenance.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/maintenance.tpl';
		} else {
			$this->template = 'default/template/common/maintenance.tpl';
		}

		$this->children = array(
			'common/footer',
			'common/header'
		);

		$this->response->setOutput($this->render());
	}
}
