<?php

class fsPhotoResizer extends PatchBase {
	function __construct() {
		parent::__construct('FastStone', 'FS Photo Resizer', 'https://www.faststone.org/FSResizerDetail.htm');
	}
	function check() : bool {
		if ($this->fetch('https://www.faststone.org/download.htm', array(), true))
			return $this->parse('/FastStone\s+Photo Resizer ([\d\.]+)/');
		return false;
	}
}

?>
