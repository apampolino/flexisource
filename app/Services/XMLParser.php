<?php

namespace App\Services;

use App\Contracts\ParserContract;

class XMLParser implements ParserContract
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
        // TODO parse xml string or xml file
    }
}