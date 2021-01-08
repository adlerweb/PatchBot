<?php

class UltraVNC extends PatchBase {
	function __construct() {
		parent::__construct('UltraVNC Team', 'UltraVNC', 'https://www.uvnc.com/downloads/ultravnc.html');
	}
	function check() : bool {
		if ($this->fetch('https://www.uvnc.com/downloads/ultravnc.html'))
			return $this->parse('/[Dd]ownload [Uu]ltra[Vv][Nn][Cc] ([\d\.]+)/');
		return false;
	}
}

?>
