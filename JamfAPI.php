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

    /**
     * Récupére les informations
     * 
     * @param string $type
     */
    private function getData(string $type) : array {
        return CurlHelper::get($this->base_url . $type, $this->options);
    }

    /**
     * Liste des applications
     *
     * Cette fonction retourne un tableau contenant les applications disponibles.
     *
     * @return array Tableau contenant les applications
     */
    public function applications(): array {
        return $this->getData("apps");
    }
    
    /**
     * Liste des iPads
     *
     * Cette fonction retourne un tableau contenant les iPads.
     *
     * @return array Tableau contenant les iPads
     */
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