<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:activity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check activity for all users today and send MissedDay notifications';

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
        \App\User::all()->each(function($user) {
            $user->checkActivityFor(\Carbon\Carbon::now());
        });
    }
}
