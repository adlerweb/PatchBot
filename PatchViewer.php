<?php

require('PatchObject.php');
require('Database.php');

$db = new Database(__DIR__ . '/db.json');
if (!$db->load()) {
	exit(1);
}
$db->sort();

?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Patchbot</title>
  </head>
  <body>
    <div class="container p-5">
      <h2 class="mb-4">Patch Notification Robot</h2>
      <p class="text-center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=WYQZCVJPVSS5L&amp;source=url"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Donate" /></a></p>
      <p>Providing you the latest update notifications:</p>
      <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
          <tr>
            <th>Vendor</th>
            <th>Product</th>
            <th>Version</th>
            <th>Release Date*</th>
          </tr>
        </thead>
        <tbody>
<?php

	for ($i = 0; $i < $db->count(); $i++) {
		$patch = $db->get($i);
		echo '<tr>';
		echo '<td>' . $patch->getVendor() . '</td>';
		echo '<td><a href="' . $patch->getURL() . '">' . $patch->getProduct() . '</a></td>';
		echo '<td>' . $patch->getVersion() . '</td>';
		echo '<td>' . date('Y-m-d', $patch->getTimestamp()) . '</td>';
		echo '</tr>' . "\r\n";
	}

?>
        </tbody>
      </table>
      <div class="text-right">
        <p><a href="https://www.dateihal.de/cms/imprint">Imprint</a> &amp; <a href="https://www.dateihal.de/cms/privacy">Privacy</a></p>
      </div>
    </div>
  </body>
</html>