<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AdminPassword;
use Webpatser\Uuid\Uuid as UUID;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin password';

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
        $admin = AdminPassword::find(0);
        if($admin == null) {
            $admin = new AdminPassword;
            $admin->id = 0;
        }
        $password = (string)UUID::generate(4);
        $admin->password = $password;
        $this->info('The new admin password: '.$password);
        
    }
}
