<?php
class Weather_model extends CI_Model {
    private $apiUrl = 'http://api.weatherapi.com/v1/current.json?key=603a0210678046d5b1273131230706&q=jakarta&aqi=no'; // Ganti dengan URL API cuaca yang sesuai
    private $apiKey = '603a0210678046d5b1273131230706'; // Ganti dengan kunci API cuaca Anda

    public function getWeather() {
        $url = $this->apiUrl . '?key=' . $this->apiKey;
        $response = file_get_contents($url);
        return json_decode($response);
    }
}
