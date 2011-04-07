<?php

	require_once(TOOLKIT . '/class.field.php');

	class Extension_NumericGroupingField extends Extension {
	/*-------------------------------------------------------------------------
		Definition:
	-------------------------------------------------------------------------*/

		public function about() {
			return array(
				'name'			=> 'Field: Numeric Grouping',
				'version'		=> '1.1',
				'release-date'	=> '2011-04-07',
				'author'		=> array(
					'name'			=> 'Rowan Lewis',
					'website'		=> 'http://pixelcarnage.com/',
					'email'			=> 'rowan@pixelcarnage.com'
				),
				'description'	=> 'Group entries on output every nth entry.'
			);
		}

		public function uninstall() {
			Symphony::Database()->query("DROP TABLE `tbl_fields_numericgrouping`");
		}

		public function install() {
			Symphony::Database()->query("
				CREATE TABLE IF NOT EXISTS `tbl_fields_numericgrouping` (
					`id` int(11) unsigned NOT NULL auto_increment,
					`field_id` int(11) unsigned NOT NULL,
					`nth_entry` tinyint default NULL,
					PRIMARY KEY  (`id`),
					KEY `field_id` (`field_id`)
				)
			");

			return true;
		}
	}

?>