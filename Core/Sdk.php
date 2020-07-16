<?php
namespace Core;

class Sdk
{
    /** @var ProviderInterface */
    private $sdk;

    private static $listProviders = [];

    /**
     * @var $instances Instances des providers
     */
    private $instances;

    public function __construct(array $providers)
    {
        session_start(); // Démarrage de la session

        // Instanciation des providers
        foreach ($providers as $provider){
            $this->instances[$provider["name"]] = new self::$listProviders[$provider["name"]]($provider["client_id"], $provider["client_secret"]);
        }
    }


    /**
     * Fonction de récupération des liens des providers
     * @return array Liste des liens
     */
    public function getLinks(){
        $links = [];

        foreach ($this->instances as $key => $instance){
            $links[$key] = $instance->getLink();
        }

        return $links;
    }

    public function getData(){
        ["state" => $state] = $_GET;

        $provider = explode("-", $state, 2);

        return $this->instances[array_pop($provider)]->getData();
    }

    public function getCallback(string $path){
        return $this->sdk->callback($path);
    }

}
