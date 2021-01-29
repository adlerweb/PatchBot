<?php

class Golinks extends PatchBase {
	function __construct() {
		parent::__construct('James Mills', 'golinks', 'https://prologic.github.io/golinks/');
	}
	function check() : bool {
		if ($this->fetch('https://api.github.com/repos/prologic/golinks/releases/latest', true))
			return $this->parse_json('tag_name');
		return false;
	}
}

?>
