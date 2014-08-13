<?php
// File: src/Fortune/ApplicationBundle/Tests/Controller/QuoteControllerTest.php

namespace Fortune\ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class QuoteControllerTest extends WebTestCase
{
    private function post($uri, array $data)
    {
        $headers = array('CONTENT_TYPE' => 'application/json');
        $content = json_encode($data);
        $client = static::createClient();
        $client->request('POST', $uri, array(), array(), $headers, $content);

        return $client->getResponse();
    }

    public function testSubmitNewQuote()
    {
        $response = $this->post('/api/quotes', array('content' => '<KnightOfNi> Ni!'));

        $this->assertSame(Response::HTTP_CREATED, $response->getStatusCode());
    }
}
