<?php

namespace DAL;

class Connection {
    
    public $link;
            
    function __construct() {
        $xml = simplexml_load_file("../DAL/config.xml");
        $this->link = mysqli_connect($xml->host,$xml->user,$xml->password,$xml->database);
    }
}
