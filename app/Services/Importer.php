<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Services\Parsers\Parser;

class Importer
{
    protected $parser;
    protected $url;

    public function __construct(Parser $parser, $url)
    {
        $this->parser = $parser;
        $this->url = $url;
    }

    public function fetch()
    {
        return file_get_contents($this->url);
    }

    public function import(Model $model)
    {
        $data = $this->parser->parse($this->fetch());

        if (is_array($data)) {
            foreach ($data as $key => $val) {

                if ($key < 100) {
                    $model::updateOrCreate(['id' => $val['id']], $val);
                } else {
                    break;
                }
            }
        } else {
            throw new Exception('parsed data should be in array format');
        }
    }
}