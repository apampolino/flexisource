<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\ParserInterface;
use \Exception;

class Importer
{
    protected $parser;
    protected $model;
    protected $url;

    public function __construct(ParserInterface $parser, Model $model, $url)
    {
        $this->parser = $parser;
        $this->model = $model;
        $this->url = $url;
    }

    public function fetch()
    {
        return file_get_contents($this->url);
    }

    public function import()
    {
        $data = $this->parser->parse($this->fetch());

        if (is_array($data)) {
            foreach ($data as $key => $val) {

                if ($key < 100) {
                    $this->model::updateOrCreate(['id' => $val['id']], $val);
                } else {
                    break;
                }
            }
        } else {
            throw new Exception('parsed data should be in array format');
        }
    }
}