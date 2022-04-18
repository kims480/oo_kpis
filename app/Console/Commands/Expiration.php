<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire user every 5 mins automatically';

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
        // return 0;
        $users=User::select('id','expire')->get();
        foreach ($users as $user) {
            $value=$user->expire;
            $user->update(['expire'=> !($value)]);
        }


        
    }
}
