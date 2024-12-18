<?php

class KasperskyKSC extends PatchBase {
	function __construct() {
		parent::__construct('Kaspersky Lab', 'Kaspersky Security Center for Windows', 'https://www.kaspersky.de/small-to-medium-business-security/downloads/security-center');
	}
	function check() : bool {
		if ($this->fetch('https://api-router.kaspersky-labs.com/downloads/search/v3/b2b?productcode=2911379&sites=https%3A%2F%2Fwww.kaspersky.com&sites=https%3A%2F%2Fwww.kaspersky.com%2Fcarribean&sites=https%3A%2F%2Fwww.kaspersky.com%2Fisrael&sites=https%3A%2F%2Fwww.kaspersky.com%2Fsouth-east-asia&sites=https%3A%2F%2Fwww.kaspersky.com%2Findonesia&sites=https%3A%2F%2Fwww.kaspersky.com%2Fthe-european-union&sites=https%3A%2F%2Fwww.kaspersky.com%2Flatvia&sites=https%3A%2F%2Fwww.kaspersky.com%2Flithuania&sites=https%3A%2F%2Fwww.kaspersky.com%2Festonia&sites=https%3A%2F%2Fwww.kaspersky.com%2Funited-kingdom&sites=https%3A%2F%2Fwww.kaspersky.com%2Fcalifornia&sites=https%3A%2F%2Fwww.kaspersky.com%2Fbrazil'))
			return $this->parse_newest('/ksc_\d+_([\d\.]+)_full_en.exe/');
		return false;
	}
}

?>
