<?php

namespace App\Console\Commands;

use App\Modules\Users\Services\UserService;
use Illuminate\Console\Command;

class GetUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:get {id?* : The id of the users want displayed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets all the users or provide one or more ids for a specific user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(UserService $service)
    {
        $ids = $this->argument('id');
        if (count($ids) != 0) foreach ($ids as $id) $this->info($service->getUserById($id));
        else foreach ($service->all() as $user) $this->info($user);
        
        return 1;
    }
}
