<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This commands create admin';

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
        $admin = new User();

        $admin->username = $this->ask('username: ');
        $admin->email = $this->ask('email: ');
        $password = $this->secret('password: ');
        $admin->password = bcrypt($password);

        $admin->save();

        echo "admin created\n";

    }
}
