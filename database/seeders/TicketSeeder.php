<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        if ($users->isEmpty()) {
            $this->command->warn('No users found. Please run UserSeeder first.');
            return;
        }

        $tickets = [
            [
                'title' => 'Cannot access email account',
                'description' => 'I am unable to log in to my company email. Getting password error.',
                'status' => 'open',
                'priority' => 'high',
            ],
            [
                'title' => 'Printer not working on 3rd floor',
                'description' => 'The HP printer near the conference room is showing offline status.',
                'status' => 'in_progress',
                'priority' => 'medium',
            ],
            [
                'title' => 'Request for new software license',
                'description' => 'Need Adobe Creative Cloud license for design work.',
                'status' => 'open',
                'priority' => 'low',
            ],
            [
                'title' => 'Laptop running very slow',
                'description' => 'My work laptop has been extremely slow for the past week. Takes 5 minutes to boot.',
                'status' => 'in_progress',
                'priority' => 'high',
            ],
            [
                'title' => 'VPN connection issues',
                'description' => 'Cannot connect to company VPN from home.',
                'status' => 'closed',
                'priority' => 'medium',
            ],
            [
                'title' => 'Need access to shared drive',
                'description' => 'Requesting access to the Marketing shared drive folder.',
                'status' => 'open',
                'priority' => 'medium',
            ],
            [
                'title' => 'Mouse not working properly',
                'description' => 'Wireless mouse keeps disconnecting every few minutes.',
                'status' => 'closed',
                'priority' => 'low',
            ],
            [
                'title' => 'Calendar sync problem',
                'description' => 'Outlook calendar not syncing with mobile device.',
                'status' => 'in_progress',
                'priority' => 'medium',
            ],
            [
                'title' => 'Password reset request',
                'description' => 'Forgot password for CRM system. Need reset link.',
                'status' => 'closed',
                'priority' => 'high',
            ],
            [
                'title' => 'Projector installation needed',
                'description' => 'New projector arrived for meeting room B. Need help installing.',
                'status' => 'open',
                'priority' => 'low',
            ],
            [
                'title' => 'Network connection drops frequently',
                'description' => 'WiFi keeps disconnecting in the east wing of the building.',
                'status' => 'in_progress',
                'priority' => 'high',
            ],
            [
                'title' => 'Software update causing crashes',
                'description' => 'After latest Windows update, Excel crashes when opening large files.',
                'status' => 'open',
                'priority' => 'high',
            ],
        ];

        foreach ($tickets as $ticketData) {
            $user = $users->random();
            
            Ticket::create([
                'title' => $ticketData['title'],
                'description' => $ticketData['description'],
                'status' => $ticketData['status'],
                'priority' => $ticketData['priority'],
                'user_id' => $user->_id,
                'assigned_to' => $users->random()->_id,
            ]);
        }

        $this->command->info('Created ' . count($tickets) . ' sample tickets.');
    }
}
