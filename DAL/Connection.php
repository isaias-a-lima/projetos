<?php

namespace DAL;

class Connection {
    
    public $link;
            
    function __construct() {
        $xml = simplexml_load_file("../DAL/config.xml");
        $this->link = new \mysqli($xml->host, $xml->user, $xml->password, $xml->database);
        if($this->link->connect_error){
            die("Erro de conexão" . $this->link->connect_error);
        }
    }
}
