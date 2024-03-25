<?php
require_once __DIR__ . "/JamfAPI.php";
$networdID = "my_networdID";
$key = "my_key";

$jamf = new JamfAPI($networdID, $key);

$UDID_iPad = "UDID_iPad";

$apps = $jamf->applications(); // Liste des applications
$apps = $jamf->devices(); // Liste des iPads
$apps = $jamf->devices_applications($UDID_iPad); // Liste des applications sur un iPad
$apps = $jamf->devices_groups(); // Liste des groupes et classes
$apps = $jamf->locations(); // Liste des localisations