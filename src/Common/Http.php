<?php
namespace DouBao\common;

use GuzzleHttp\Client;

class Http{
    private $httpIns = null;
    public function init(){
        if(empty($this->httpIns)){
            $this->httpIns = new Client();
        }
    }

    public function doHttp(){
        $response = $this->httpIns->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        if($response->getStatusCode() == 200){
            return $response->getBody();
        }else{
            return false;
        }
    }

    public function doPromise(){

    }
}