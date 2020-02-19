<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Player;
use App\Jobs\ImportJob;
use App\Services\Importer;
use App\Parsers\JSONParser;
use App\Parsers\XMLParser;

class ImportPlayerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:player {--F|format=json} {--url=https://fantasy.premierleague.com/api/bootstrap-static/}';

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
            $this->info("Importing players using {$format} format");
            
            switch ($format) {
                case 'json':
                    $parser = new JSONParser;
                    break;
                case 'xml':
                    $parser = new XMLParser;
            }

            $model = new Player;
            $importer = new Importer($parser, $model, $url);
            ImportJob::dispatch($importer);
        } else {
            $this->error('format not available');
        }
    }
}
