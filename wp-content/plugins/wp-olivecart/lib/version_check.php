<?php
new OliveCartVersionCheck;
class OliveCartVersionCheck{
	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'cart_meta';
	}
}