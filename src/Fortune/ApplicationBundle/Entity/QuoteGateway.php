<?php
// File: src/Fortune/ApplicationBundle/Entity/QuoteGateway.php

namespace Fortune\ApplicationBundle\Entity;

use Doctrine\ORM\EntityRepository;

class QuoteGateway extends EntityRepository
{
    public function insert($content)
    {
        $entityManager = $this->getEntityManager();

        $quote = Quote::fromContent($content);
        $entityManager->persist($quote);
        $entityManager->flush();

        return $quote;
    }
}
