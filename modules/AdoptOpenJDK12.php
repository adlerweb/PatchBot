<?php

class AdoptOpenJDK12 extends PatchBase {
	function __construct() {
		parent::__construct('AdoptOpenJDK', 'OpenJDK JRE 12', 'https://adoptopenjdk.net/');
	}
	function check() : bool {
		if ($this->fetch('https://api.adoptopenjdk.net/v2/info/releases/openjdk12?release=latest&openjdk_impl=hotspot&type=jre&os=windows&arch=x64', true))
			return $this->parse_json('openjdk_version');
		return false;
	}
}

?>