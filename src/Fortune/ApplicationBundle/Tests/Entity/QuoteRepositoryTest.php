<?php
// File: src/Fortune/ApplicationBundle/Tests/Entity/QuoteRepositoryTest.php

namespace Fortune\ApplicationBundle\Tests\Entity;

use Fortune\ApplicationBundle\Entity\QuoteFactory;
use Fortune\ApplicationBundle\Entity\QuoteGateway;
use Fortune\ApplicationBundle\Entity\QuoteRepository;

class QuoteRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const CONTENT = '<KnightOfNi> Ni!';

    private $repository;

    public function setUp()
    {
        $filename = '/tmp/fortune_database_test.txt';
        $gateway = new QuoteGateway($filename);
        $factory = new QuoteFactory();
        $this->repository = new QuoteRepository($gateway, $factory);
    }

    public function testItPersistsTheQuote()
    {
        $quote = $this->repository->insert(self::CONTENT);
        $id = $quote['quote']['id'];
        $quotes = $this->repository->findAll();
        $foundQuote = $quotes['quotes'][$id];

        $this->assertSame(self::CONTENT, $foundQuote['content']);
    }
}
