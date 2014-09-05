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
        
        /*
         * Plugins For Login Page CSS
         */

        

        /*
         * Plugins For Login Page JS
         */
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
        $this->document->addScript('view/assets/plugins/slider/bootstrap-slider.js');
        
        $this->document->addScript('view/assets/plugins/toastr/toastr.js');
        
//        FULL CALENDAR JS
        $this->document->addScript('view/assets/plugins/fullcalendar/lib/jquery-ui.custom.min.js');
        $this->document->addScript('view/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js');
        $this->document->addScript('view/assets/js/full-calendar.js');
        
//        EASY PIE CHART JS
        $this->document->addScript('view/assets/plugins/easypie-chart/easypiechart.min.js');
        $this->document->addScript('view/assets/plugins/easypie-chart/jquery.easypiechart.min.js');
        
//        KNOB JS
        $this->document->addScript('view/assets/plugins/jquery-knob/jquery.knob.js');
        $this->document->addScript('view/assets/plugins/jquery-knob/knob.js');
        
//        FLOT CHART JS
        $this->document->addScript('view/assets/plugins/flot-chart/jquery.flot.js');
        $this->document->addScript('view/assets/plugins/flot-chart/jquery.flot.tooltip.js');
        $this->document->addScript('view/assets/plugins/flot-chart/jquery.flot.resize.js');
        $this->document->addScript('view/assets/plugins/flot-chart/jquery.flot.selection.js');
        $this->document->addScript('view/assets/plugins/flot-chart/jquery.flot.stack.js');
        $this->document->addScript('view/assets/plugins/flot-chart/jquery.flot.time.js');
        
//        MORRIS JS
        $this->document->addScript('view/assets/plugins/morris-chart/raphael.min.js');
        $this->document->addScript('view/assets/plugins/morris-chart/morris.min.js');
        
//        C3 JS
        $this->document->addScript('view/assets/plugins/c3-chart/d3.v3.min.js');
        $this->document->addScript('view/assets/plugins/c3-chart/c3.min.js');
        
//        MAIN APPS JS
        $this->document->addScript('view/assets/js/demo-panel.js');
        
        $this->data['title'] = $this->document->getTitle();

        if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
            $this->data['base'] = HTTPS_SERVER;
        } else {
            $this->data['base'] = HTTP_SERVER;
        }

        $this->data['description'] = $this->document->getDescription();
        $this->data['keywords'] = $this->document->getKeywords();
        $this->data['links'] = $this->document->getLinks();
        $this->data['styles'] = $this->document->getStyles();

        $this->data['lang'] = $this->language->get('code');
        $this->data['direction'] = $this->language->get('direction');

        $this->language->load('common/header');

        $this->data['heading_title'] = $this->language->get('heading_title');
        
        $this->data['text_notification'] = $this->language->get('text_notification');
        $this->data['text_see_all_notification'] = $this->language->get('text_see_all_notification');
        $this->data['text_task'] = $this->language->get('text_task');
        $this->data['text_see_all_task'] = $this->language->get('text_see_all_task');
        $this->data['text_message'] = $this->language->get('text_message');
        $this->data['text_see_all_message'] = $this->language->get('text_see_all_message');
        $this->data['text_account_setting'] = $this->language->get('text_account_setting');
        $this->data['text_payment_setting'] = $this->language->get('text_payment_setting');
        $this->data['text_lock_screen'] = $this->language->get('text_lock_screen');
        $this->data['text_logout'] = $this->language->get('text_logout');
        $this->data['text_dashboard'] = $this->language->get('text_dashboard');
        $this->data['text_player'] = $this->language->get('text_player');
        $this->data['text_user'] = $this->language->get('text_user');
        $this->data['text_users'] = $this->language->get('text_users');
        $this->data['text_user_group'] = $this->language->get('text_user_group');

        if (!$this->user->isLogged() || !isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token'])) {
            $this->data['logged'] = '';

            $this->data['home'] = $this->url->link('common/login', '', 'SSL');
        } else {
            
            $this->data['permission'] = $this->user->getPermission();
            
            $this->data['account_setting'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['payment_setting'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['lock_screen'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['logout'] = $this->url->link('common/logout', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['dashboard'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['player'] = $this->url->link('account/player', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['user'] = $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['user_group'] = $this->url->link('user/user_permission', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['applications'] = array();

            $this->load->model('setting/application');

            $results = $this->model_setting_application->getApplications();

            foreach ($results as $result) {
                $this->data['applications'][] = array(
                    'name' => $result['name'],
                    'href' => $result['url']
                );
            }
        }

        $this->template = 'common/header.tpl';

        $this->render();
    }

}
