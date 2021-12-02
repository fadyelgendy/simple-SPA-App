<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class informAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inform:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send updates to Admin every hour';

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
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
