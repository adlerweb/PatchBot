<?php

class fsImageViewer extends PatchBase {
	function __construct() {
		parent::__construct('FastStone', 'FS Image Viewer', 'https://www.faststone.org/FSViewerDetail.htm');
	}
	function check() : bool {
		if ($this->fetch('https://www.faststone.org/download.htm', array(), true))
			return $this->parse('/FastStone\s+Image Viewer ([\d\.]+)/');
		return false;
	}
}

?>
