<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UpdateUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Update existing users without role field to have default role
     */
    public function run(): void
    {
        // Update all users without role to have 'operasional' role
        User::whereNull('role')->update(['role' => 'operasional']);
        
        // You can manually set specific users to administrator
        // Example: Set the first user as administrator
        $firstUser = User::first();
        if ($firstUser && !$firstUser->role) {
            $firstUser->update(['role' => 'administrator']);
        }
        
        $this->command->info('User roles updated successfully!');
    }
}
