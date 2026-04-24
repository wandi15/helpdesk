<?php

namespace App\Livewire;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;

class DashboardStats extends Component
{
    public $statusFilter = 'all';

    #[Computed]
    public function stats()
    {
        return [
            'total' => Ticket::count(),
            'open' => Ticket::where('status', 'open')->count(),
            'in_progress' => Ticket::where('status', 'in_progress')->count(),
            'closed' => Ticket::where('status', 'closed')->count(),
            'high_priority' => Ticket::where('priority', 'high')->count(),
        ];
    }

    #[Computed]
    public function recentTickets()
    {
        $query = Ticket::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10);

        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
