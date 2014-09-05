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
 * Description of application Class
 *
 * @author ahmet
 */
class ModelSettingApplication extends Model {

    public function addApplication($data) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "application SET name = '" . $this->db->escape($data['config_name']) . "', `url` = '" . $this->db->escape($data['config_url']) . "', `ssl` = '" . $this->db->escape($data['config_ssl']) . "'");

        $this->cache->delete('application');

        return $this->db->getLastId();
    }

    public function editApplication($application_id, $data) {
        $this->db->query("UPDATE " . DB_PREFIX . "application SET name = '" . $this->db->escape($data['config_name']) . "', `url` = '" . $this->db->escape($data['config_url']) . "', `ssl` = '" . $this->db->escape($data['config_ssl']) . "' WHERE application_id = '" . (int) $application_id . "'");

        $this->cache->delete('application');
    }

    public function deleteApplication($application_id) {
        $this->db->query("DELETE FROM " . DB_PREFIX . "application WHERE application_id = '" . (int) $application_id . "'");

        $this->cache->delete('application');
    }

    public function getApplication($application_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "application WHERE application_id = '" . (int) $application_id . "'");

        return $query->row;
    }

    public function getApplications($data = array()) {
        $application_data = $this->cache->get('application');

        if (!$application_data) {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "application ORDER BY url");

            $application_data = $query->rows;

            $this->cache->set('application', $application_data);
        }

        return $application_data;
    }

    public function getTotalApplications() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "application");

        return $query->row['total'];
    }

    public function getTotalApplicationsByLayoutId($layout_id) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_layout_id' AND `value` = '" . (int) $layout_id . "' AND application_id != '0'");

        return $query->row['total'];
    }

    public function getTotalApplicationsByLanguage($language) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_language' AND `value` = '" . $this->db->escape($language) . "' AND application_id != '0'");

        return $query->row['total'];
    }

    public function getTotalApplicationsByCurrency($currency) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_currency' AND `value` = '" . $this->db->escape($currency) . "' AND application_id != '0'");

        return $query->row['total'];
    }

    public function getTotalApplicationsByCountryId($country_id) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_country_id' AND `value` = '" . (int) $country_id . "' AND application_id != '0'");

        return $query->row['total'];
    }

    public function getTotalApplicationsByZoneId($zone_id) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_zone_id' AND `value` = '" . (int) $zone_id . "' AND application_id != '0'");

        return $query->row['total'];
    }

    public function getTotalApplicationsByCustomerGroupId($customer_group_id) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_customer_group_id' AND `value` = '" . (int) $customer_group_id . "' AND application_id != '0'");

        return $query->row['total'];
    }
}
