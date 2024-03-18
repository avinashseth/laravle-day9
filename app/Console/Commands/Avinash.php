<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Avinash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avinash:seth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info("Defusing nuclear bomb, one at a minute!");
    }
}
