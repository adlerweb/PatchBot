<?php

class PatchCache {
	private static $cache = [];
	
	public static function get($uid) { 
		return self::$cache[$uid] ?? null; 
	} 
	
	public static function set($uid, $data) { 
		self::$cache[$uid] = $data; 
	} 
	
	public static function exists($uid) { 
		return isset(self::$cache[$uid]); 
	} 
	
	public static function remove($uid) { 
		unset(self::$cache[$uid]); 
	} 
}
