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
 * Description of header Class
 *
 * @author ahmet
 */
class ControllerCommonHeader extends Controller {

    protected function index() {

        $this->data['title'] = $this->document->getTitle();
        
        $this->document->addScript('view/assets/plugins/skycons/skycons.js');
        $this->document->addScript('view/assets/plugins/prettify/prettify.js');
        $this->document->addScript('view/assets/plugins/magnific-popup/jquery.magnific-popup.min.js');
        $this->document->addScript('view/assets/plugins/owl-carousel/owl.carousel.min.js');
        $this->document->addScript('view/assets/plugins/chosen/chosen.jquery.min.js');
        $this->document->addScript('view/assets/plugins/icheck/icheck.min.js');
        $this->document->addScript('view/assets/plugins/datepicker/bootstrap-datepicker.js');
        $this->document->addScript('view/assets/plugins/timepicker/bootstrap-timepicker.js');
        $this->document->addScript('view/assets/plugins/mask/jquery.mask.min.js');
        $this->document->addScript('view/assets/plugins/validator/bootstrapValidator.min.js');
        $this->document->addScript('view/assets/plugins/datatable/js/jquery.dataTables.min.js');
        $this->document->addScript('view/assets/plugins/datatable/js/bootstrap.datatable.js');
        $this->document->addScript('view/assets/plugins/summernote/summernote.min.js');
        $this->document->addScript('view/assets/plugins/markdown/markdown.js');
        $this->document->addScript('view/assets/plugins/markdown/to-markdown.js');
        $this->document->addScript('view/assets/plugins/markdown/bootstrap-markdown.js');
        $this->document->addScript('view/assets/plugins/slider/bootstrap-slider.js');
        $this->document->addScript('view/assets/plugins/toastr/toastr.js');
        
        $this->document->addStyle('view/assets/plugins/weather-icon/css/weather-icons.min.css');
        $this->document->addStyle('view/assets/plugins/prettify/prettify.min.css');
        $this->document->addStyle('view/assets/plugins/magnific-popup/magnific-popup.min.css');
        $this->document->addStyle('view/assets/plugins/owl-carousel/owl.carousel.min.css');
        $this->document->addStyle('view/assets/plugins/owl-carousel/owl.theme.min.css');
        $this->document->addStyle('view/assets/plugins/owl-carousel/owl.transitions.min.css');
        $this->document->addStyle('view/assets/plugins/chosen/chosen.min.css');
        $this->document->addStyle('view/assets/plugins/icheck/skins/all.css');
        $this->document->addStyle('view/assets/plugins/datepicker/datepicker.min.css');
        $this->document->addStyle('view/assets/plugins/timepicker/bootstrap-timepicker.min.css');
        $this->document->addStyle('view/assets/plugins/validator/bootstrapValidator.min.css');
        $this->document->addStyle('view/assets/plugins/summernote/summernote.min.css');
        $this->document->addStyle('view/assets/plugins/markdown/bootstrap-markdown.min.css');
        $this->document->addStyle('view/assets/plugins/datatable/css/bootstrap.datatable.min.css');
        $this->document->addStyle('view/assets/plugins/morris-chart/morris.min.css');
        $this->document->addStyle('view/assets/plugins/c3-chart/c3.min.css');
        $this->document->addStyle('view/assets/plugins/slider/slider.min.css');
        $this->document->addStyle('view/assets/plugins/salvattore/salvattore.css');
        $this->document->addStyle('view/assets/plugins/toastr/toastr.css');
        $this->document->addStyle('view/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css');
        $this->document->addStyle('view/assets/plugins/fullcalendar/fullcalendar/fullcalendar.print.css');

        if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
            $this->data['base'] = HTTPS_SERVER;
        } else {
            $this->data['base'] = HTTP_SERVER;
        }

        $this->data['description'] = $this->document->getDescription();
        $this->data['keywords'] = $this->document->getKeywords();
        $this->data['links'] = $this->document->getLinks();
        $this->data['styles'] = $this->document->getStyles();
        $this->data['scripts'] = $this->document->getScripts();
        $this->data['lang'] = $this->language->get('code');
        $this->data['direction'] = $this->language->get('direction');

        $this->language->load('common/header');

        $this->data['heading_title'] = $this->language->get('heading_title');


        if (!$this->user->isLogged() || !isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token'])) {
            $this->data['logged'] = false;

            $this->data['home'] = $this->url->link('common/login', '', 'SSL');
        } else {
            $this->data['logged'] = sprintf($this->language->get('text_logged'), $this->user->getUserName());
            $this->data['home'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['front'] = HTTP_PUBLIC;
            $this->data['logout'] = $this->url->link('common/logout', 'token=' . $this->session->data['token'], 'SSL');
        }


        $this->template = 'common/header.tpl';

        $this->render();
    }

}
