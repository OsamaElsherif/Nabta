<?php
// api host
$host = '127.0.0.1';
// api port
$port = '5000';
// api main route
$link = "http://$host:$port";
// Request object
class Request {
    // resolve the url
    protected function escapefile_url($url) {
        $parts = parse_url($url);
        $path_parts = array_map('rawurldecode', explode('/', $parts['path']));
        // print_r($parts);
        return
          $parts['scheme'] . '://' .
          $parts['host'] . ':' . $parts['port'] .
          implode('/', array_map('rawurlencode', $path_parts));
      }
    // create the request
    public function Create(String $api_link = null) {
        // resolve url
        $api_link = $this->escapefile_url("$api_link");
        // create request
        try {
            $response = file_get_contents("$api_link");
            return array(TRUE, $response);
        } catch (\Throwable $th) {
            return array(False, $th);
        }
    }
} 
?>