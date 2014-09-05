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
 * Description of login Class
 *
 * @author ahmet
 */
class ControllerCommonLogin extends Controller {

    private $error = array();

    public function index() {

        /*
         * Plugins For Login Page CSS
         */

        $this->document->addStyle('view/assets/plugins/icheck/skins/all.css');

        /*
         * Plugins For Login Page JS
         */
        $this->document->addScript('view/assets/js/demo-panel-login.js');
        $this->document->addScript('view/assets/plugins/icheck/icheck.min.js');

        $this->language->load('common/login');

        $this->document->setTitle($this->language->get('heading_title'));

        if ($this->user->isLogged() && isset($this->request->get['token']) && ($this->request->get['token'] == $this->session->data['token'])) {
            $this->redirect($this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'));
        }

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->session->data['token'] = md5(mt_rand());

            if (isset($this->request->post['redirect']) && (strpos($this->request->post['redirect'], HTTP_SERVER) === 0 || strpos($this->request->post['redirect'], HTTPS_SERVER) === 0 )) {
                $this->redirect($this->request->post['redirect'] . '&token=' . $this->session->data['token']);
            } else {
                $this->redirect($this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'));
            }
        }

        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_login'] = $this->language->get('text_login');
        $this->data['text_forgotten'] = $this->language->get('text_forgotten');
        $this->data['text_remember'] = $this->language->get('text_remember');
        $this->data['text_two_factor'] = $this->language->get('text_two_factor');

        $this->data['entry_username'] = $this->language->get('entry_username');
        $this->data['entry_password'] = $this->language->get('entry_password');
        $this->data['entry_two_factor'] = $this->language->get('entry_two_factor');

        $this->data['button_login'] = $this->language->get('button_login');

        if ((isset($this->session->data['token']) && !isset($this->request->get['token'])) || ((isset($this->request->get['token']) && (isset($this->session->data['token']) && ($this->request->get['token'] != $this->session->data['token']))))) {
            $this->error['warning'] = $this->language->get('error_token');
        }

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $this->data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $this->data['success'] = '';
        }

        $this->data['action'] = $this->url->link('common/login', '', 'SSL');

        if (isset($this->request->post['username'])) {
            $this->data['username'] = $this->request->post['username'];
        } else {
            $this->data['username'] = '';
        }

        if (isset($this->request->post['password'])) {
            $this->data['password'] = $this->request->post['password'];
        } else {
            $this->data['password'] = '';
        }

        if (isset($this->request->get['route'])) {
            $route = $this->request->get['route'];

            unset($this->request->get['route']);

            if (isset($this->request->get['token'])) {
                unset($this->request->get['token']);
            }

            $url = '';

            if ($this->request->get) {
                $url .= http_build_query($this->request->get);
            }

            $this->data['redirect'] = $this->url->link($route, $url, 'SSL');
        } else {
            $this->data['redirect'] = '';
        }

        if ($this->config->get('config_password')) {
            $this->data['forgotten'] = $this->url->link('common/forgotten', '', 'SSL');
        } else {
            $this->data['forgotten'] = '';
        }

        $this->template = 'common/login.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    public function keygenerator() {

        $json = array();

        $this->load->language('common/login');
        $username = $this->request->post['user'];

        $this->load->model('user/user');

        $user_info = $this->model_user_user->getUserByUsername($username);

        if ($user_info) {

            if ($user_info['two_factor_enabled']) {

                $digits = 8;

                // Send this key VIA SMS
                $auth_key = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                
                $user = "semitellc";
                $password = "ZePFFHQAQQgQIF";
                $api_id = "3497179";
                $baseurl ="http://api.clickatell.com";

                $text = urlencode("Your Two Factor Auth Key is :".$auth_key);
                $to = $user_info['mobile'];

                // auth call
                $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";

                // do auth call
                $ret = file($url);

                // explode our response. return string is on first line of the data returned
                $sess = explode(":",$ret[0]);
                if ($sess[0] == "OK") {

                    $sess_id = trim($sess[1]); // remove any whitespace
                    $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";

                    // do sendmsg call
                    $ret = file($url);
                    $send = explode(":",$ret[0]);

                    if ($send[0] == "ID") {
                        
                        // Write this Key to Database as Encrypted

                        $this->model_user_user->updateAuthToken($this->encryption->encrypt($auth_key), $user_info['user_id']);

                        $json = array(
                            'status' => true,
                            'success' => $this->language->get('key_success')
                        );
                        
//                        echo "successnmessage ID: ". $send[1];
                    } else {
//                        echo "send message failed";
                        $json = array(
                            'status' => false,
                            'error' => $this->language->get('error_message')
                        );
                    }
                } else {
//                    echo "Authentication failure: ". $ret[0];
                }
                
                
                
                
//                 Write this Key to Database as Encrypted ---> Remove Later

//                        $this->model_user_user->updateAuthToken($this->encryption->encrypt($auth_key), $user_info['user_id']);
//
//                        $json = array(
//                            'status' => true,
//                            'success' => $this->language->get('key_success').$auth_key
//                        );

                
            } else {
                $json = array(
                    'status' => false,
                    'error' => $this->language->get('error_key_enabled')
                );
            }
        } else {
            $json = array(
                'status' => false,
                'error' => $this->language->get('error_login')
            );
        }

        $this->response->setOutput(json_encode($json));
    }

    protected function validate() {


        $this->load->model('user/user');

        $user_info = $this->model_user_user->getUserByUsername($this->request->post['username']);
        
        if ($user_info && $user_info['two_factor_enabled']){
            
            if (!isset($this->request->post['username']) || !isset($this->request->post['password']) || !$this->user->login($this->request->post['username'], $this->request->post['password'], $this->request->post['twofactor'])) {
               $this->error['warning'] = $this->language->get('error_two_factor');
            }
        } elseif ($user_info && !$user_info['two_factor_enabled']) {
        
            if (!isset($this->request->post['username']) || !isset($this->request->post['password']) || !$this->user->login($this->request->post['username'], $this->request->post['password'])) {
                $this->error['warning'] = $this->language->get('error_login');
            }
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

}
