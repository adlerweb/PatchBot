<?php

require('PatchObject.php');
require('Database.php');

date_default_timezone_set('UTC');
$db = new Database(__DIR__ . '/db.json');
if (!$db->load()) {
	exit(1);
}
$db->sort();

?>
<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="https://www.patchbot.de/rss.xml" rel="self" type="application/rss+xml" />
<title>Patch Notification Robot</title>
<link>https://www.patchbot.de/</link>
<description>Providing you the latest update notifications.</description>
<?php

	for ($i = 0; $i < $db->count(); $i++) {
		$patch = $db->get($i);
		echo '<item>';
		echo '<title>' . $patch->getVendor() . ' released ' . $patch->getProduct();
		if (!empty($patch->getBranch()))
			echo ' ' . $patch->getBranch();
		echo ' version ' . $patch->getVersion() . '.</title>';
		echo '<link>' . $patch->getURL() . '</link>';
		echo '<pubDate>' . date(DATE_RSS, $patch->getTimestamp()) . '</pubDate>';
		echo '<guid isPermaLink="false">' . hash('sha256', $patch) . '</guid>';
		echo '</item>' . "\r\n";
	}

?>
</channel>
</rss>
