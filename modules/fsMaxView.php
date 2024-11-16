<?php

class fsMaxView extends PatchBase {
	function __construct() {
		parent::__construct('FastStone', 'FS MaxView', 'https://www.faststone.org/FSMaxViewDetail.htm');
	}
	function check() : bool {
		if ($this->fetch('https://www.faststone.org/download.htm', array(), true))
			return $this->parse('/FastStone\s+MaxView ([\d\.]+)/');
		return false;
	}
}

?>
