<?php

// Autoloader
include("autoload.php");

use Core\Sdk;

$sdk = new Sdk([
        [
            "name" => "Facebook",
            "client_id" => "",
            "client_secret" => ""
        ],
        [
            "name" => "Linkedin",
            "client_id" => "",
            "client_secret" => ""
        ],
        [
            "name" => "Cours",
            "client_id" => "",
            "client_secret" => ""
        ],
    ]
);

if (!isset($_GET["code"])) {
    $links = $sdk->getLinks();
    foreach ($links as $key => $link){
        echo "<a href='".$link."'>".$key."</a><br>";
    }
} else {
    var_dump($sdk->getData());
}
