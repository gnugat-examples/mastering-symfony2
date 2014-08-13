<?php
// File: src/Fortune/ApplicationBundle/Controller/QuoteController.php

namespace Fortune\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class QuoteController extends Controller
{
    public function submitAction(Request $request)
    {
        $postedContent = $request->getContent();
        $postedValues = json_decode($postedContent, true);

        $answer['quote']['content'] = $postedValues['content'];

        return new JsonResponse($answer, Response::HTTP_CREATED);
    }
}
