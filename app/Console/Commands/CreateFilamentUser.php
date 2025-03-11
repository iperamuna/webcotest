<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

final class CreateFilamentUser extends Command
{
    // The name and signature of the console command.
    protected $signature = 'filament:user:create
                            {name : The name of the user}
                            {email : The email address of the user}
                            {password : The password of the user}';

    // The console command description.
    protected $description = 'Create a new Filament user in the system';

    // Execute the console command.
    public function handle()
    {
        // Retrieve the arguments
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        // Check if the user already exists
        if (User::where('email', $email)->exists()) {
            $this->error("A user with the email {$email} already exists.");

            return;
        }

        // Create the new user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Assign a role if needed
        // $user->assignRole('admin'); // Uncomment if you want to assign a role like 'admin'

        $this->info('Filament user created successfully!');
    }
}
