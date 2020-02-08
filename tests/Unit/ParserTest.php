<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Parsers\Parser;
use App\Services\Parsers\JSONParser;
use App\Services\Parsers\XMLParser;

class ParserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testJSON()
    {
        $parser = new JSONParser();

        $this->assertInstanceOf(Parser::class, $parser);
    }

    public function testXML()
    {
        $parser = new XMLParser();

        $this->assertInstanceOf(Parser::class, $parser);
    }
}
