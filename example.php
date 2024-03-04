<?php
require_once __DIR__ . "/JamfAPI.php";
$networdID = "my_networdID";
$key = "my_key";

$jamf = new JamfAPI($networdID, $key);

$apps = $jamf->applications();
var_dump($apps[1]);