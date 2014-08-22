<?php
// File: src/Fortune/ApplicationBundle/Entity/QuoteFactory.php

namespace Fortune\ApplicationBundle\Entity;

class QuoteFactory
{
    public function makeOne(Quote $rawQuote)
    {
        return array('quote' => $this->make($rawQuote));
    }

    public function makeAll(array $rawQuotes)
    {
        foreach ($rawQuotes as $rawQuote) {
            $quotes['quotes'][$rawQuote->getId()] = $this->make($rawQuote);
        }

        return $quotes;
    }

    private function make(Quote $rawQuote)
    {
        return array(
            'id' => $rawQuote->getId(),
            'content' => $rawQuote->getContent(),
        );
    }
}
