<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ImporterJob;
use App\Services;

class ImporterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:import {--F|format=json} {--url=https://fantasy.premierleague.com/api/bootstrap-static/}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import player statistics';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $format = $this->option('format');
        $url = $this->option('url');

        if (in_array($format, ['json', 'xml']) && $url) {
            $this->info("Importing using {$format} format");
            $parserClass = 'App\\Services\\' . strtoupper($format) . 'Parser';
            $parser = new $parserClass($url);
            ImporterJob::dispatch($parser);
            $this->info('Players successfully imported');
        } else {
            $this->error('format not available');
        }
    }
}
