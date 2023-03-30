<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;
class test_db_connection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test_db_connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing DB Connection';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        try {
            DB::connection()->getPDO();
            dump('Database is connected. Database Name is : ' . DB::connection()->getDatabaseName());
        } catch (Exception $e) {
            dump('Database connection failed');
        }
    }
}
