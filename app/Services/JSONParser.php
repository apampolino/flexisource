<?php

namespace App\Services;

use App\Contracts\ParserContract;

class JSONParser implements ParserContract
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getData()
    {
        $data = file_get_contents($this->url);
        return $this->parse($data);
    }

    /**
    * return array
    */
    public function parse($data)
    {
        $data = json_decode($data, true);
        return $data['elements'];
    }
}