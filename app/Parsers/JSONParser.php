<?php

namespace App\Parsers;

use App\Contracts\ParserInterface;

class JSONParser implements ParserInterface
{
    public function parse($json)
    {
        $data = json_decode($json, true);
        
        if (isset($data['elements'])) {
            return $data['elements'];
        }
        
        throw new Exception('elements key not found');
    }
}