<?php

class Bitwarden_rs extends PatchBase {
	function __construct() {
		parent::__construct('Daniel García', 'Bitwarden Web Vault in Rust', 'https://github.com/dani-garcia/bw_web_builds');
	}
	function check() : bool {
		if ($this->fetch('https://api.github.com/repos/dani-garcia/bw_web_builds/releases/latest', true))
			return $this->parse_json('tag_name');
		return false;
	}
}

?>
