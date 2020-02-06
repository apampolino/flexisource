<?php

namespace App\Services;

use App\Player;

class Importer
{
    protected $data;

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function save()
    {
        $limit = 0;

        foreach ($this->data as $key => $val) {

            if ($limit < 100) {
                Player::updateOrCreate(['id' => $val['id']], $val);
                $limit++;
            } else {
                break;
            }
        }
    }
}