<?php
// File: src/Fortune/ApplicationBundle/Entity/QuoteRepository.php

namespace Fortune\ApplicationBundle\Entity;

class QuoteRepository
{
    private $gateway;
    private $factory;

    public function __construct(QuoteGateway $gateway, QuoteFactory $factory)
    {
        $this->gateway = $gateway;
        $this->factory = $factory;
    }

    public function insert($content)
    {
        $quote = $this->gateway->insert($content);

        return $this->factory->makeOne($quote);
    }

    public function findAll()
    {
        $quotes = $this->gateway->findAll();

        return $this->factory->makeAll($quotes);
    }
}
