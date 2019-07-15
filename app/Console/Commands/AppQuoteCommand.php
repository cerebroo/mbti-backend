<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class AppQuoteCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:quote
                            {times=1 : No. of quotes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Writes an inspiring quote on terminal.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $times = (int)$this->argument('times');

        for ($k = 0; $k < $times; $k++) {
            $this->comment(Inspiring::quote());
        }

        return;
    }
}
