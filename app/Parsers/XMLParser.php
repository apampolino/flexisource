<?php

namespace App\Parsers;

use App\Contracts\ParserInterface;

class XMLParser implements ParserInterface
{
    public function parse($xml)
    {
        // TODO parse xml string or xml file
        // return (isset($data['elements'])) ? $data['elements'] : throw new Exception('elements key not found');
    }
}