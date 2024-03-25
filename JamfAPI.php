<?php
require_once __DIR__ . "/../CurlHelper/CurlHelper.php";

class JamfAPI {
    private $base_url = "https://apiv6.zuludesk.com/";
    private $key;
    private $networkID;
    private $options;

    public function __construct($networkID, $key) {
        $this->networkID = $networkID;
        $this->key = $key;
        $this->options = $this->options();
    }

    private function options(): array {
        return array(
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->networkID . ":" . $this->key,
            CURLOPT_CAINFO => __DIR__ . "/Amazon Root CA 1.crt"
        );
    }

    private function getData(string $type) : array {
        return CurlHelper::get($this->base_url . $type, $this->options);
    }

    public function applications(): array {
        return $this->getData("apps");
    }
    
    public function devices(): array {
        return $this->getData("devices");
    }

    public function devices_applications(string $UDID) : array {
        return $this->getData("devices/" . $UDID . "/apps");
    }

    public function devices_groups(): array {
        return $this->getData("devices/groups");
    }
}