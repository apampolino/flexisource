<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Player;
use App\Http\Controllers\PlayerController;

class PlayerControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new PlayerController;
        $data = $controller->index();
        $this->assertNotEmpty($data);
    }

    public function testSinglePlayer()
    {
        $controller = new PlayerController;
        $player = Player::find(1);
        $data = $controller->show($player);
        $this->assertNotEmpty($data);
    }

    public function testPlayerNotExist()
    {
        $controller = new PlayerController;
        $data = json_decode($controller->show(100)->getContent(), true);
        $this->assertEquals('Player not found', $data['message']);
    }
}
