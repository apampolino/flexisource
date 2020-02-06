<?php

namespace App\Contracts;

interface ParserContract
{
    public function __construct($url);
    public function getData();
    public function parse($data);
}