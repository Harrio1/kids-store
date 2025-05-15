<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignAdminRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make-admin {identifier : The ID or email of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign admin role to a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $identifier = $this->argument('identifier');
        
        // Check if the identifier is an email
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $identifier)->first();
        } else {
            // Otherwise, treat as ID
            $user = User::find($identifier);
        }
        
        if (!$user) {
            $this->error("User not found with identifier: {$identifier}");
            return 1;
        }
        
        // Update the user's role to admin
        $user->role = 'admin';
        $user->save();
        
        $this->info("Successfully assigned admin role to {$user->name} ({$user->email})");
        return 0;
    }
}
