<?php

class HostOption {
	private static $values = array(
		'api.github.com' => array('Authorization: token TOKEN')
		);
	public static function get(string $key) {
		return array_key_exists($key, self::$values) ? self::$values[$key] : false;
	}
}

?>
