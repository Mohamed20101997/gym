<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Console\Command;

class clear extends Command
{
    protected $signature = 'clear:clear';

    protected $description = 'clear[cache , view , config ,log] , optimize';

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
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
        exec('echo "" > ' . storage_path('logs/laravel.log'));
        $this->info('cleared successfully');     

    }
}
