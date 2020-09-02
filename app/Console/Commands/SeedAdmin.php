<?php

namespace App\Console\Commands;

use App\Entities\Factory;
use Illuminate\Console\Command;

class SeedAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:admin {--name=} {--email=} {--password=}';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Generating Admin User For This Website');

        $name = $this->option('name');
        $email = $this->option('email');
        $password = $this->option('password');

        if(!($name && $email && $password)) {
            // response
            $this->info('Error:: Wrong Data Provided!');
            return 0;
        }

        $bar = $this->output->createProgressBar();

        $user = Factory::build('user');
        
        $bar->advance();
        
        $user->setName($name);
        $user->setEmail($email);
        $user->setIsAdmin(true);
        $user->setPassword($password);
        $user->setPassword(\App\Libraries\UserLibrary::hash($password));
        
        $bar->advance();
        
        $guid = $user->save();
        
        $bar->advance();

        $this->info('Successful:: Admin User Generated with guid ' . $guid);

        $bar->finish();

        // resposne

        return 0;
    }
}
