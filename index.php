<?php
include("autoload.php");

use App\Sdk;


$sdk = new Sdk([
        [
            "name" => "Facebook",
            "client_id" => "232416044757491",
            "client_secret" => "8ae6612fbb9faac7dbae30302e384a57"
        ],
        [
            "name" => "Linkedin",
            "client_id" => "77pcr0on0nudus",
            "client_secret" => "I2Z6Ij891YEOTkkM"
        ],
        [
            "name" => "Github",
            "client_id" => "b455be6ee53ada10c7bd",
            "client_secret" => "9b9b0a524240eaf594676845501802c8ad7070cb"
        ],
        [
            "name" => "Cours"
        ]
    ]
);

if (!isset($_GET["code"])) {
    $links = $sdk->getLinks();
    foreach ($links as $key => $link){
        var_dump($link);
        echo "<a href='".$link."'>".$key."</a><br>";
    }
} else {
    var_dump($sdk->getUserData());
}
