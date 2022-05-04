<?php

namespace App\Console\Commands;

use App\Modules\Auth\Services\AuthService;
use Illuminate\Console\Command;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a user to the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AuthService $service)
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');
        $service->register(['name' => $name, 'email' => $email, 'password' => $password], []);
        $this->info(json_encode($service->getResult()));
        return 0;
    }
}
