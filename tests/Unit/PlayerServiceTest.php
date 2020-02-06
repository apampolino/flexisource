<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

use App\Services\PlayerService;

class PlayerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPlayerCount()
    {
        $service = new PlayerService;
        $data = $service->getAllPlayers();

        // limit to 100 players
        $this->assertCount(100, $data);
    }

    public function testInstance()
    {
        $service = new PlayerService;
        $data = $service->getAllPlayers();
        $this->assertInstanceOf(Collection::class, $data);
    }
}
