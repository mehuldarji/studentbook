<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CronController;

class MailCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:MailCronJob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $setting = new CronController();
        $setting->sendEmailByCronJobs();
        $this->info('MailCronJob:update Command Run successfully!');
        
    }
}
