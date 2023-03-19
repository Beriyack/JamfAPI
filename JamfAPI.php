<?php
require_once __DIR__ . "/../CurlHelper/CurlHelper.php";

class JamfAPI {
    private $base_url = "https://apiv6.zuludesk.com/";
    private $key;
    private $networkID;

    public function __construct($networkID, $key) {
        $this->networkID = $networkID;
        $this->key = $key;
    }

    public function listApplications(): array {
        $options = array(
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->networkID . ":" . $this->key,
            CURLOPT_CAINFO => __DIR__ . "/Amazon Root CA 1.crt"
        );

        $list_applications = CurlHelper::get($this->base_url . "apps", $options);
        $list_applications[1] = json_decode($list_applications[1]);

        return $list_applications;
    }
}