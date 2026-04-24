<?php

namespace App\Livewire\FormTicket;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

class ListTicket extends Component
{
    use WithPagination;

    #[Url(keep: true)]
    public $search = '';
    
    #[Url(keep: true)]
    public $statusFilter = 'all';
    
    #[Url(keep: true)]
    public $priorityFilter = 'all';
    
    #[Url(keep: true)]
    public $sortBy = 'created_at';
    
    #[Url(keep: true)]
    public $sortDirection = 'desc';
    
    public $perPage = 15;
    
    public $selectedTicket = null;
    public $showDetailModal = false;
    
    // Edit Modal Properties
    public $showEditModal = false;
    public $editingTicket = null;
    public $updateSuccess = false;
    public $editForm = [
        'title' => '',
        'description' => '',
        'priority' => 'medium',
        'status' => 'open',
        'division' => '',
        'ticket_type' => '',
        'system_type' => '',
        'attachment' => null,
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingPriorityFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
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
    
    public function editTicket($ticketId)
    {
        $this->editingTicket = Ticket::find($ticketId);
        
        if ($this->editingTicket) {
            $this->editForm = [
                'title' => $this->editingTicket->title,
                'description' => $this->editingTicket->description,
                'priority' => $this->editingTicket->priority,
                'status' => $this->editingTicket->status,
                'division' => $this->editingTicket->division ?? '',
                'ticket_type' => $this->editingTicket->ticket_type ?? '',
                'system_type' => $this->editingTicket->system_type ?? '',
                'attachment' => $this->editingTicket->attachment ?? null,
            ];
            
            $this->showEditModal = true;
            $this->showDetailModal = false;
            $this->updateSuccess = false;
        }
    }
    
    public function updateTicket()
    {
        $rules = [
            'editForm.title' => 'required|min:5|max:255',
            'editForm.description' => 'required|min:10',
            'editForm.priority' => 'required|in:low,medium,high',
            'editForm.status' => 'required|in:open,in_progress,closed',
            'editForm.division' => 'required|min:2',
            'editForm.ticket_type' => 'required|in:teknis,sistem',
        ];
        
        // Add system_type validation only if ticket_type is 'sistem'
        if ($this->editForm['ticket_type'] === 'sistem') {
            $rules['editForm.system_type'] = 'required|in:baru,perubahan,penambahan';
        }
        
        $validated = $this->validate($rules);
        
        if ($this->editingTicket) {
            $updateData = [
                'title' => $this->editForm['title'],
                'description' => $this->editForm['description'],
                'priority' => $this->editForm['priority'],
                'status' => $this->editForm['status'],
                'division' => $this->editForm['division'],
                'ticket_type' => $this->editForm['ticket_type'],
            ];
            
            // Add system_type only if ticket_type is 'sistem'
            if ($this->editForm['ticket_type'] === 'sistem') {
                $updateData['system_type'] = $this->editForm['system_type'];
            } else {
                // Clear system_type if ticket_type is changed to 'teknis'
                $updateData['system_type'] = null;
            }
            
            $this->editingTicket->update($updateData);
            
            $this->updateSuccess = true;
            
            // Refresh the tickets list
            $this->dispatch('$refresh');
            
            // Close modal after 1.5 seconds
            $this->dispatch('ticket-updated');
        }
    }
    
    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->editingTicket = null;
        $this->updateSuccess = false;
        $this->reset('editForm');
    }

    #[Computed]
    public function tickets()
    {
        $query = Ticket::with('user');

        // Search
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Status filter
        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        // Priority filter
        if ($this->priorityFilter !== 'all') {
            $query->where('priority', $this->priorityFilter);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return $query->paginate($this->perPage);
    }

    #[Computed]
    public function stats()
    {
        return [
            'total' => Ticket::count(),
            'open' => Ticket::where('status', 'open')->count(),
            'in_progress' => Ticket::where('status', 'in_progress')->count(),
            'closed' => Ticket::where('status', 'closed')->count(),
        ];
    }

    public function render()
    {
        return view('livewire.form-ticket.list-ticket');
    }
}
