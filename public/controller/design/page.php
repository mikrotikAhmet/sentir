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
 * Description of page Class
 *
 * @author ahmet
 */
class ControllerDesignPage extends Controller {

    public $page_info = array();

    public function index() {

        $this->page_info = $this->page->getPage();

        if ($this->page_info) {

            if ($this->page->getDescription()) {
                $this->document->setDescription($this->page->getDescription());
            } else {
                $this->document->setDescription($this->config->get('config_meta_description'));
            }

            $this->document->setKeywords($this->page->getKeyword());

            $this->document->setTitle($this->config->get('config_title') . $this->language->get('text_separator') . $this->page->getPageTitle());

            $this->data['heading_title'] = $this->config->get('config_title');

            $page_blocks = $this->page->getPageBlocks();

            $this->data['page_blocks'] = array();
            

            $this->load->model('design/block');
            $this->load->model('tool/image');

            $block_data = array();

            foreach ($page_blocks as $page_block) {

                $result = $this->model_design_block->getBlock($page_block['block_id']);

                if (!empty($result['image']) && file_exists(DIR_IMAGE . $result['image'])) {
                    $image = $this->model_tool_image->resize($result['image'], 150, 150);
                } else {
                    $image = '';
                }

                $block_data = array(
                    'block_id' => $result['block_id'],
                    'image' => $image,
                    'class' => $result['class'],
                    'additional_classes' => $result['additional_classes'],
                    'show_title' => $result['show_title'],
                    'show_sub_title' => $result['show_sub_title'],
                    'show_image' => $result['show_image'],
                    'title' => $result['title'],
                    'sub_title' => $result['sub_title']
                );

                $block_units = $this->model_design_block->getBlockUnits($result['block_id']);

                $block_unit_data = array(
                    'block_unit' => $block_units
                );


                $this->data['page_blocks'][] = array(
                    'block_data' => $block_data,
                    'block_unit_data' => $block_unit_data
                );
                
                
                $this->data['modules'] = array();
                
                foreach ($block_units as $unit_data) {

                    if (!empty($unit_data['subject'])) {
                        $subjects = unserialize($unit_data['subject']);

                        foreach ($subjects as $subject) {
                            if ($subject['type'] == 'module') {
                                
                                $this->module->setModule($subject['subject_id']);
                                
                                
                                
                                $module = $this->getChild('module/' . $this->module->getModule());

                                if ($module) {
                                    
                                        $this->data['modules'][] = $module;
                                }
                            }
                        }
                    }
                }
            }




            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/design/page.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/design/page.tpl';
            } else {
                $this->template = 'default/template/design/page.tpl';
            }
        } else {

            throw new Exception('Page Not Found');
            exit(1);
        }

        $this->children = array(
            'common/footer',
            'common/header',
        );

        $this->response->setOutput($this->render());
    }

}
