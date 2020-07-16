<?php

namespace Core;

interface ProviderInterface
{
    public function __construct(string $client_id, string $client_secret);

    public function getLink(): string;

    public function getData();
}
