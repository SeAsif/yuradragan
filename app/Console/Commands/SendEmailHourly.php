<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailHourly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendemail:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send email hourly';

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
        //Todo Email details will be here

        $this->info('Email Sent successfully!');

    }
}
