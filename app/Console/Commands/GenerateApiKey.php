<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateApiKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:apikey {--length=32 : Длина ключа}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generation of a random API-key';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $length = (int) $this->option('length');

        $apiKey = Str::random($length);

        $this->info("Your API-key: {$apiKey}");

        return 0;
    }
}
