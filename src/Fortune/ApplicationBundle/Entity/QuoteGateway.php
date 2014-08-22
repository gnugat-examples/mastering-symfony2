<?php
// File: src/Fortune/ApplicationBundle/Entity/QuoteGateway.php

namespace Fortune\ApplicationBundle\Entity;

class QuoteGateway
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function insert($content)
    {
        $content = trim($content);
        $line = $content."\n";
        file_put_contents($this->filename, $line, FILE_APPEND);
        $lines = file($this->filename);
        $lineNumber = count($lines) - 1;

        return new Quote($lineNumber, $content);
    }

    public function findAll()
    {
        $contents = file($this->filename);
        foreach ($contents as $id => $content) {
            $quotes[$id] = new Quote($id, trim($content));
        }

        return $quotes;
    }
}
