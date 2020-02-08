<?php

namespace App\Services\Parsers;

use App\Services\Parsers\Parser;

class JSONParser implements Parser
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