<?php
/**
 * CakePHP TinyMCE Plugin
 *
 * Copyright 2009 - 2010, Cake Development Corporation
 *                        1785 E. Sahara Avenue, Suite 490-423
 *                        Las Vegas, Nevada 89104
 *
 * Licensed under The LGPL License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright 2009 - 2010, Cake Development Corporation (http://cakedc.com)
 * @link      http://github.com/CakeDC/TinyMCE
 * @package   plugins.tiny_mce
 * @license   LGPL License (http://www.opensource.org/licenses/lgpl-2.1.php)
 */

/**
 * Short description for class.
 *
 * @package  plugins.tiny_mce.views.helpers
 */

class TinymceHelper extends AppHelper {

/**
 * Other helpers used by FormHelper
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html');

/**
 * 
 *
 * @var array
 * @access public
 */
	public $configs = array();

/**
 * 
 *
 * @var array
 * @access protected
 */
	protected $_defaults = array();

/**
 * Adds a new editor to the script block in the head
 *
 * @see http://wiki.moxiecode.com/index.php/TinyMCE:Configuration for a list of keys
 * @param mixed If array camel cased TinyMce Init config keys, if string it checks if a config with that name exists
 * @return void
 * @access public
 */
	public function editor($options = array()) {
		if (is_string($options)) {
			if (isset($this->configs[$options])) {
				$options = $this->configs[$options];
			} else {
				throw new OutOfBoundsException(sprintf(__('Invalid TinyMCE configuration preset %s', true), $options));
			}
		}
		$options = array_merge($this->_defaults, $options);
		$lines = '';
		
		foreach ($options as $option => $value) {
			$lines .= Inflector::underscore($option) . ' : "' . $value . '",' . "\n";
		}
		$this->Html->scriptBlock('

        $(function() {
                $("textarea.tinymce").tinymce({
                        // Location of TinyMCE script
                        script_url : "/js/tiny_mce/tiny_mce.js",

                        // General options
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                        // Theme options
                        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true,

                        // Example content CSS (should be your site CSS)
                        content_css : "css/content.css",

                        // Drop lists for link/image/media/template dialogs
                        template_external_list_url : "lists/template_list.js",
                        external_link_list_url : "lists/link_list.js",
                        external_image_list_url : "lists/image_list.js",
                        media_external_list_url : "lists/media_list.js",

                        // Replace values for the template plugin
                        template_replace_values : {
                                username : "Some User",
                                staffid : "991234"
                        }
                });
        });
		
		' . "\n", array(
			'inline' => false));
	}

/**
 * beforeRender callback
 *
 * @return void
 * @access public
 */
	public function beforeRender() {
		$this->Html->script('/js/tiny_mce/tiny_mce.js', false);
	}
}
?>
