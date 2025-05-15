<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-admin {--name= : The name of the admin user} {--email= : The email of the admin user} {--password= : The password for the admin user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');
        $email = $this->option('email');
        $password = $this->option('password');
        
        // Prompt for name if not provided
        if (!$name) {
            $name = $this->ask('Enter the admin name');
        }
        
        // Prompt for email if not provided
        if (!$email) {
            $email = $this->ask('Enter the admin email');
        }
        
        // Prompt for password if not provided
        if (!$password) {
            $password = $this->secret('Enter the admin password (min 8 characters)');
            $passwordConfirmation = $this->secret('Confirm the admin password');
            
            if ($password !== $passwordConfirmation) {
                $this->error('Passwords do not match');
                return 1;
            }
        }
        
        // Validate the input
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }
        
        // Create the admin user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
        ]);
        
        $this->info("Admin user created successfully:");
        $this->info("Name: {$user->name}");
        $this->info("Email: {$user->email}");
        $this->info("Role: {$user->role}");
        
        return 0;
    }
}
