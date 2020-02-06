<?php 

namespace App\Services;

use App\Player;

class PlayerService
{
    public function getAllPlayers()
    {
        return Player::selectRaw("id, CONCAT(first_name, ' ', second_name) as fullname")->get();
    }
}