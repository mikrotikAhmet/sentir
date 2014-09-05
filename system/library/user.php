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
 * Description of user Class
 *
 * @author ahmet
 */
class User {

    private $user_id;
    private $username;
    private $fullname;
    private $avatar;
    private $twofactor;
    private $permission = array();
    private $_permission;

    public function __construct($registry) {

        require_once DIR_APPLICATION . 'model/tool/image.php';

        $this->db = $registry->get('db');
        $this->imager = new ModelToolImage($registry);
        $this->request = $registry->get('request');
        $this->session = $registry->get('session');
        $this->encryption = $registry->get('encryption');

        if (isset($this->session->data['user_id'])) {
            $user_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user WHERE user_id = '" . (int) $this->session->data['user_id'] . "' AND status = '1'");

            if ($user_query->num_rows) {
                $this->user_id = $user_query->row['user_id'];
                $this->username = $user_query->row['username'];
                $this->twofactor = $user_query->row['two_factor_enabled'];
                $this->fullname = ucfirst($user_query->row['firstname']) . ' ' . strtoupper($user_query->row['lastname']);
                $this->avatar = $user_query->row['image'];

                $this->db->query("UPDATE " . DB_PREFIX . "user SET ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE user_id = '" . (int) $this->session->data['user_id'] . "'");

                $user_group_query = $this->db->query("SELECT permission FROM " . DB_PREFIX . "user_group WHERE user_group_id = '" . (int) $user_query->row['user_group_id'] . "'");

                $permissions = unserialize($user_group_query->row['permission']);

                if (is_array($permissions)) {
                    foreach ($permissions as $key => $value) {
                        $this->permission[$key] = $value;
                    }
                }
            } else {
                $this->logout();
            }
        }
    }

    public function login($username, $password, $auth_token = '') {

        $user_info = $this->getUserInfo($username);

        $sql = "SELECT * FROM " . DB_PREFIX . "user WHERE username = '" . $this->db->escape($username) . "' AND (password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $this->db->escape($password) . "'))))) OR password = '" . $this->db->escape(md5($password)) . "') AND status = '1'";


        if ($user_info && $user_info['two_factor_enabled']) {
            $sql .= " AND two_factor = '" . $this->db->escape($this->encryption->encrypt($auth_token)) . "'";
        }

        $user_query = $this->db->query($sql);

        if ($user_query->num_rows) {
            $this->session->data['user_id'] = $user_query->row['user_id'];

            $this->user_id = $user_query->row['user_id'];
            $this->username = $user_query->row['username'];
            $this->twofactor = $user_query->row['two_factor_enabled'];
            $this->avatar = $user_query->row['image'];

            $user_group_query = $this->db->query("SELECT permission FROM " . DB_PREFIX . "user_group WHERE user_group_id = '" . (int) $user_query->row['user_group_id'] . "'");

            $permissions = unserialize($user_group_query->row['permission']);

            if (is_array($permissions)) {
                foreach ($permissions as $key => $value) {
                    $this->permission[$key] = $value;
                }
            }

            $this->db->query("UPDATE " . DB_PREFIX . "user SET two_factor = '' WHERE user_id = '" . (int) $this->session->data['user_id'] . "'");

            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        unset($this->session->data['user_id']);

        $this->user_id = '';
        $this->username = '';
        $this->avatar = '';
        $this->twofactor = '';



        session_destroy();
    }

    public function hasPermission($key, $value) {
        if (isset($this->permission[$key])) {
            return in_array($value, $this->permission[$key]);
        } else {
            return false;
        }
    }

    public function isLogged() {
        return $this->user_id;
    }

    public function getId() {
        return $this->user_id;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getFullName() {
        return $this->fullname;
    }

    public function getAvatar() {

        if (file_exists(DIR_IMAGE . $this->avatar)) {
            $this->avatar = $this->imager->resize($this->avatar, 100, 100);
        } else {
            $this->avatar = $this->imager->resize('no_image.jpg', 100, 100);
        }

        return $this->avatar;
    }

    public function getUserInfo($username) {

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user WHERE username = '" . $this->db->escape($username) . "'");

        return $query->row;
    }

    public function setPermission($permisson) {

        $this->_permission = $permisson;
    }

    public function getPermission() {
        return $this->_permission;
    }

}
