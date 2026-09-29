<?php

namespace App\Livewire;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;

class DashboardStats extends Component
{
    public $statusFilter = 'all';
    public $selectedTicket = null;
    public $showDetailModal = false;

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

    public function viewDetail($ticketId)
    {
        $this->selectedTicket = Ticket::with('user')->find($ticketId);
        $this->showDetailModal = true;
    }

    public function closeModal()
    {
        $this->showDetailModal = false;
        $this->selectedTicket = null;
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
