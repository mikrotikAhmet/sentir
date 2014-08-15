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
 * Description of footer Class
 *
 * @author ahmet
 */
class ControllerCommonFooter extends Controller {

    protected function index() {
        $this->language->load('common/footer');

        $this->data['scripts'] = $this->document->getScripts();

        // Application Menu
        $this->load->model('design/menu');

        $this->data['leftmenus'] = array();
        $this->data['rightmenus'] = array();

        $menus = $this->model_design_menu->getMenus();

        foreach ($menus as $menu) {

            $link = $this->url->link('design/page', $menu['page_link']);

            if ($menu['bottom']) {

                $this->data['footer_menus'][] = array(
                    'title' => $menu['title'],
                    'href' => $link
                );
            }
        }

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/common/footer.tpl';
        } else {
            $this->template = 'default/template/common/footer.tpl';
        }

        $this->render();
    }

}
