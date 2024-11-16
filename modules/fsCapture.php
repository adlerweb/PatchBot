<?php

class fsCapture extends PatchBase {
	function __construct() {
		parent::__construct('FastStone', 'FS Capture', 'https://www.faststone.org/FSCaptureDetail.htm');
	}
	function check() : bool {
		if ($this->fetch('https://www.faststone.org/download.htm', array(), true))
			return $this->parse('/FastStone\s+Capture ([\d\.]+)/');
		return false;
	}
}

?>
